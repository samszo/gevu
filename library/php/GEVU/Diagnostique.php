<?php

class GEVU_Diagnostique extends GEVU_Site{
    	
	/**
	* constructeur de la class
	*
    * @param string $idBase
    * 
    */
	public function __construct($idBase=false)
    {
    	parent::__construct($idBase);
		
    }
	
	/**
	* calcul le diagnostic d'un lieu
	* et renvoie les résultats 
    * @param string $idLieu
    * @param int $idExi
    * @param string $idBase
    * @return Array
    */
	public function calculDiagForLieu($idLieu, $idInstant=-1, $idBase=false){
		$c = str_replace("::", "_", __METHOD__)."_".$idLieu."_".$idInstant."_".$idBase; 
	   	$r = $this->cache->load($c);
        if(!$r){
			
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbD)$this->dbD = new Models_DbTable_Gevu_diagnostics($this->db);
	        
	        if($idInstant==-1){
	        	//marque les derniers diagnostics
	        	$this->dbD->setLastDiagForLieu($idLieu);
	        }

	        //récupère les diags oui
	        $r['DiagOui'] = $this->dbD->getDiagReponse($idLieu, $idInstant, 1);
	        //récupère les diags non
	        $r['DiagNon'] = $this->dbD->getDiagReponse($idLieu, $idInstant, 2);
	        //récupère tous les diags
	        $r['DiagTot'] = $this->dbD->getDiagReponse($idLieu, $idInstant);

	        //calcule les handicateurs
			$r['handicateur']['auditif'] = $this->getHandicateur("auditif",$r);
			$r['handicateur']['cognitif'] = $this->getHandicateur("cognitif",$r);
			$r['handicateur']['moteur'] = $this->getHandicateur("moteur",$r);
			$r['handicateur']['visuel'] = $this->getHandicateur("visuel",$r);	        
	        
			//calcul les stats
			$r['stat'] = $this->getArrStat($idLieu, $r);
			
	        $this->cache->save($r, $c);
        }        
	        
        return $r;
	}
	
	/**
	* calcul le XML pour l'affichage des stats
	* 
    * @param string $idLieu
    * @param array $r
    * @return string
    */
	function getXmlStat($idLieu, $r){
		$xml = "<EtatDiag idSite='".$this->idBase."' idLieu='".$idLieu."' TauxCalc='0 sur 0' >";
		foreach ($r['handicateur'] as $k=>$v) {
			$xml .= "<Obstacles id='".$k."' ><niv0>".$v['applicable']."</niv0><niv1>".$r['DiagNon'][0][$k."_1"]."</niv1><niv2>".$r['DiagNon'][0][$k."_2"]."</niv2><niv3>".$r['DiagNon'][0][$k."_3"]."</niv3><handi>".$v[0]."</handi></Obstacles>";
		}
		$xml .= "</EtatDiag>";

		return $xml;
	}
	
	/**
	* calcul un tableau pour l'affichage des stats
	* 
    * @param string $idLieu
    * @param array $r
    * @return array
    */
	function getArrStat($idLieu, $r){
		$arr = array();
		foreach ($r['handicateur'] as $k=>$v) {
			$arr['EtatDiag'][] = array('id'=>$k,'niv0'=>$v['applicable'],'niv1'=>$r['DiagNon'][0][$k."_1"],'niv2'=>$r['DiagNon'][0][$k."_2"],'niv3'=>$r['DiagNon'][0][$k."_3"],'handi'=>$v[0]);
		}
		return $arr;
	}
	
	/**
	* calcul l'handicateur pour une déficience
	* 
    * @param string $typeDef
    * @param array $arrDiag
    * @return array
    */
	function getHandicateur($typeDef, $arrDiag){
		
		$HandiObst = $arrDiag['DiagNon'][0][$typeDef."_1"]
			+($arrDiag['DiagNon'][0][$typeDef."_2"]*2)
			+($arrDiag['DiagNon'][0][$typeDef."_3"]*3);
			  
		$HandiAppli = $arrDiag['DiagOui'][0][$typeDef."_1"]
			+($arrDiag['DiagOui'][0][$typeDef."_2"])
			+($arrDiag['DiagOui'][0][$typeDef."_3"]);
		
		$Handi3 = $arrDiag['DiagNon'][0][$typeDef."_3"];
					
		if($HandiAppli==0)
			return array("A","obstacle"=>$HandiObst,"applicable"=>$HandiAppli,"coef"=>0);	
		//calcul le coefficient d'handicateur
		$handi = $HandiObst/$HandiAppli;
		//calcule la lettre correspond au coefficient
		//suivant l'interval et suivant la contrainte de niveau trois
		if($handi>=0 && $handi<=0.2 && $Handi3==0)	
			return array("A","obstacle"=>$HandiObst,"applicable"=>$HandiAppli,"coef"=>$handi);	
		if($handi>0.2 && $handi<=0.4 && $Handi3==0)	
			return array("B","obstacle"=>$HandiObst,"applicable"=>$HandiAppli,"coef"=>$handi);	
		//attention on r�initialise l'interval pour afficher les cas pr�c�dent ayant un Handi 3
		// 0.4 devient 0	
		if($handi>=0 && $handi<=0.6)	
			return array("C","obstacle"=>$HandiObst,"applicable"=>$HandiAppli,"coef"=>$handi);	
		if($handi>0.6 && $handi<=0.8)	
			return array("D","obstacle"=>$HandiObst,"applicable"=>$HandiAppli,"coef"=>$handi);	
		if($handi>0.8)	
			return array("E","obstacle"=>$HandiObst,"applicable"=>$HandiAppli,"coef"=>$handi);	
	}	

	/**
	* renvoie le diagnostic d'un lieu
    * @param string $idLieu
    * @param int $idExi
    * @param string $idBase
    * @return Array
    */
	public function getDiagForLieu($idLieu, $idExi, $idBase=false){
		$c = str_replace("::", "_", __METHOD__)."_".$idLieu."_".$idExi."_".$idBase; 
	   	$r = $this->cache->load($c);
        if(!$r){
			$this->idExi = $idExi;
			
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbD)$this->dbD = new Models_DbTable_Gevu_diagnostics($this->db);
				        
	        //récupère les campagnes pour le lieu
	        $r = $this->dbD->getCampagnes($idLieu);
	        $nb = count($r);
	        for ($i = 0; $i < $nb; $i++) {        	
		        //récupère les diags 
		        $r[$i]['diag'] = $this->calculDiagForLieu($idLieu, $r[$i]["id_instant"]);
	        }
	        
	        $this->cache->save($r, $c);
        }        
	        
        return $r;
	}
	
	/**
	* cherche un lieu à partir d'un texte
	* renvoie les résultats 
    * @param string $txtLieu
    * @param string $idBase
    * @return Array
    */
	public function findLieu($idLieu=-1, $txtLieu="", $idBase=false){
		$c = str_replace("::", "_", __METHOD__)."_".$idLieu."_".$idBase; 
	   	$r = $this->cache->load($c);
        if(!$r){
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbL)$this->dbL = new Models_DbTable_Gevu_lieux($this->db);

        	$r = array();
	        if($idLieu){
		        //recherche par identifiant
		        $arr = $this->dbL->findById_lieu($idLieu);
		        $r['id'] = $this->setResultLieu($arr);
		        $r['lib'] = "";
	        }
	        if($txtLieu){
		        //recherche par lib
		        $arr = $this->dbL->findByLib($txtLieu);
		        $r['lib'] = $this->setResultLieu($arr);
				$r['id'] = ""; 
	        }
	    	$this->cache->save($r, $c);
        }        
        return $r;
	}
    
	/**
	* formate le résultat d'une recherche de lieu 
    * @param Array $r
    * 
    * @return Array
    */
	public function setResultLieu($r){
        $result = array();
		//pour chaque lieu trouvé
        $nb = count($r);
        for ($i = 0; $i < $nb; $i++) {
        	//ajoute le fil d'ariane du lieux pour afficher les résultats
        	$arrL = $this->dbL->getFullPath($r[$i]['id_lieu']);
        	//création du xml pour afficher dans l'arboressence
			$dom = false;
			$j = 1;
			$nbA = count($arrL);
        	foreach ($arrL as $L){
        		if(!$dom){
					$dom = new DomDocument();
					$dom->loadXML($this->getXmlLieu($L)."</node>");        			
					$foo = $dom->documentElement;
        		}else{
					$d = new DomDocument();
					//vérifie s'il faut ajouter les noeuds enfants de l'item trouvé
					if($j == $nbA){
						$d = $this->getXmlNode($L['id_lieu'],$this->idBase);
					}else{
						$d->loadXML($this->getXmlLieu($L)."</node>");
					}
					if($d){
						$mNewNode = $dom->importNode($d->documentElement, true);
						$foo->appendChild($mNewNode);
					}        			
					$foo = $foo->lastChild;
        		}
        		$j ++;
			}
			$s = $dom->saveXML();        						
        	$result[] = array("ariane"=>$arrL,"tree"=>$dom); 
        }
		return $result;
	}
	
	
	/**
	 * récupère la descendance d'un noeud au format xml
    * @param int $idLieu
    * @param string $idBase
    * @param integer $nivMax
    * @return DomDocument
    */
	public function getXmlNode($idLieu=0, $idBase=false, $nivMax=3){
		$c = str_replace("::", "_", __METHOD__)."_".$idLieu."_".$idBase; 
	   	$xml = $this->cache->load($c);
        if(!$xml){
    		$xml="";
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbL)$this->dbL = new Models_DbTable_Gevu_lieux($this->db);
			
        	$r = $this->dbL->findById_lieu($idLieu);
        	$xml = $this->getXmlEnfant($idLieu, $nivMax);
	    	$this->cache->save($xml, $c);
        }
        if($xml!=""){
	        $dom = new DomDocument();
	        $dom->loadXML($xml);
        }else{
	        $dom = false;
        }
        return $dom;
        
    }
        
    /**
     * Récupération des enfants d'un lieu
     *
     * @param integer $idLieu
     * @param integer $nivMax
     * @param integer $niv
     * @return string
     */
    public function getXmlEnfant($idLieu, $nivMax=1, $niv=0){
    	    	
    	$r = $this->dbL->findByLieu_parent($idLieu);
		$xml ="";
		foreach ($r as $v){
        	$xml .= $this->getXmlLieu($v);
        	//vérifie s'il faut afficher les enfants
        	if($v['nbDiag']>0){
				$xml = "";
        		break;        		
        	} 
        	if($nivMax > $niv){
		    	//récupère le xml des enfants
	    		$xml .= $this->getXmlEnfant($v['id_lieu'], $nivMax, $niv+1);
        	}else{
    			$xml .="<node idLieu=\"-10\" lib=\"loading...\" fake=\"1\" icon=\"voieIcon\" />";
	    	}
		    $xml .= "</node>\n";				
        }
        
        //création de la racine
    	if($niv==0){
        	$r = $this->dbL->findById_lieu($idLieu);
        	$xml = $this->getXmlLieu($r[0])
        		.$xml
        		."</node>\n";
    	}
        
		return $xml;
    }
    
    /**
     * Récupération du format xml d'un lieu
     *
     * @param array $rLieu
     * @return string
     */
    public function getXmlLieu($rLieu){
        return "<node idLieu=\"".$rLieu['id_lieu']."\" lib=\"".htmlspecialchars($rLieu['lib'])."\" niv=\"".$rLieu['niv']."\" fake=\"0\" >";
    }

    /**
     * Récupération d'un diagnostic complet
     *
     * @param int $idLieu
     * @param string $idBase
     * @param string $idInst
     * 
     * @return array
     */
    public function getDiagComplet($idLieu=0, $idBase=false, $idInst=-1){
		$c = str_replace("::", "_", __METHOD__)."_".$idLieu."_".$idBase; 
	   	$rs = $this->cache->load($c);
        if(!$rs){           
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbD)$this->dbD = new Models_DbTable_Gevu_diagnostics($this->db);
        	if(!$this->dbP)$this->dbP = new Models_DbTable_Gevu_problemes($this->db);
        	if(!$this->dbO)$this->dbO = new Models_DbTable_Gevu_observations($this->db);
        	        	
        	$rs['questions'] = $this->dbD->getAllDesc($idLieu,-1, "", -1, $idInst);
        	$rs['problemes'] = $this->dbP->findById_lieu($idLieu);
        	$rs['observations'] = $this->dbO->findById_lieu($idLieu);

        	$this->cache->save($rs, $c);
        }
        return $rs;
    }

    /**
     * Récupération de la liste des diagnostics
     *
     * @param array $params
     * @param string $idBase
     * @return array
     */
    public function getDiagListe($params, $idBase=false){
		$c = str_replace("::", "_", __METHOD__)."_".$idBase."_".$params['idLieu']."_".$params['handi']."_".$params['niv']; 
	   	$rs = $this->cache->load($c);
        if(!$rs){           
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbD)$this->dbD = new Models_DbTable_Gevu_diagnostics($this->db);

	        //récupère les campagnes pour le lieu
	        $rs = $this->dbD->getDiagliste($params['idLieu'], 1, $params['handi'], $params['niv']);
	        $nb = count($rs);
	        $oLieu = -1;
	        for ($i = 0; $i < $nb; $i++) {
	        	//vérifie si on traite un nouveau lieu
	        	if($oLieu != $rs[$i]['dLieu']){
	        		$oLieu = $rs[$i]['dLieu'];
	        		//ajoute le fil d'ariane du lieu
	        		$r[$oLieu]['ariane'] = $this->findLieu($oLieu,"",$idBase);
	        	}        	
		        //ajoute la réponse au diagnostic
        		$r[$oLieu][] = $rs[$i];
	        }
        	

        	$this->cache->save($r, $c);
        }
        return $r;
    }
        
    /**
     * Récupération des données liées à iun lieu
     *
     * @param int $idLieu
     * @param int $idExi
     * @param string $idBase
     * @return array
     */
    public function getNodeRelatedData($idLieu, $idExi, $idBase=false){
    
		$c = str_replace("::", "_", __METHOD__)."_".$idLieu."_".$idExi."_".$idBase; 
	   	$res = $this->cache->load($c);
    	        
        if(!$res){
            $res = array();
            $this->idExi = $idExi;
            
			//initialise les gestionnaires de base de données
			$this->getDb($idBase);
        	if(!$this->dbL)$this->dbL = new Models_DbTable_Gevu_lieux($this->db);
                    	
        	//création du fil d'ariane
            $res['ariane']=$this->dbL->getFullPath($idLieu);
	        
            //récupération des données courantes
			$Rowset = $this->dbL->find($idLieu);
			$lieu = $Rowset->current();
			
			//récupération des données lieés
            $dt = $this->dbL->getDependentTables();
            foreach($dt as $t){
				$items = $lieu->findDependentRowset($t);
				if($items->count()){
					//vérifie si on traite un cas particulier
	            	if($t=="Models_DbTable_Gevu_diagnostics" || $t=="Models_DbTable_Gevu_problemes"  || $t=="Models_DbTable_Gevu_observations" ){
	            		//récupère les informations seulement si ce n'est pas déjà fait
	            		// car une même requête renvoie les informations des 3 tables
	            		if(!isset($res["___diagnostics"])){
				        	$res["___diagnostics"] = $this->getDiagForLieu($idLieu, $idExi, $idBase);			
	            		}	
	            	}else{
						$res[$t]=$items->toArray();
	            	}
            	}
			}
			//vérifie si les enfants ont des diagnostics
			$rs = $this->dbL->findByLieu_parent($idLieu);
			foreach ($rs as $r){
				if($r['nbDiag']>0){
					//récupère les informations de l'enfant
					$resEnf = $this->getDiagForLieu($r['id_lieu'], $idExi, $idBase);
					if(count($res["___diagnostics"]["enfants"])== 0)$res["___diagnostics"]["enfants"]=$resEnf;
					else $res["___diagnostics"]["enfants"] = array_merge($res["___diagnostics"]["enfants"], $resEnf);			
				}
			}
			//ajoute le dernier diagnostic pour le lieu
	        $res["___diagnostics"]['diag'] = $this->calculDiagForLieu($idLieu,-1,$idBase);
			
            $this->cache->save($res, $c);
        }
        return $res;
    }

    /**
     * Récupération d'un scenario complet
     *
     * @param int $idScenario
     * 
     * @return array
     */
    public function getScenarioComplet($idScenario){
		$c = str_replace("::", "_", __METHOD__)."_".$idScenario; 
	   	$rs = $this->cache->load($c);
        if(!$rs){           

			//initialise les gestionnaires de base de données
        	if(!$this->dbScena)$this->dbScena = new Models_DbTable_Gevu_scenario($this->db);
        	if(!$this->dbScene)$this->dbScene = new Models_DbTable_Gevu_scenes($this->db);
        	if(!$this->dbC)$this->dbC = new Models_DbTable_Gevu_criteres($this->db);
        	
        	//récupération des informations de scenario
        	$arrScena = $this->dbScena->findById_scenario($idScenario);
        	$psScena = Zend_Json::decode($arrScena[0]['params']);
        	foreach ($psScena as $pEtapes) {
        		foreach ($pEtapes['etapes'] as $pScene) {
	        		if(!isset($rs["criteres"][$pScene['id_type_controle']])){
		        		$rsCrit = $this->dbC->findByIdTypeControle($pScene['id_type_controle']);	        		
	        			$rs["criteres"]["idTypeControle".$pScene['id_type_controle']] = $rsCrit;
	        		}
	        		$rsScene = $this->dbScene->findByIdScene($pScene['id_scene']);
	        		$rsScene['id_type_controle']=$pScene['id_type_controle'];
	        		$rs["etapes"][$pEtapes['num']] = $rsScene;
        		}
        	}
        	
        	$this->cache->save($rs, $c);
        }

        return $rs;
    }

    /**
     * Enregistre les choix de diagnostic
     *
     * @param int $idExi
     * @param int $idLieu
     * @param string $comment
     * @param array $params
     * @param int $idBase
     * 
     * @return int
     */
    public function setChoix($idExi, $idLieu, $comment, $params, $idBase){
		
		//initialise les gestionnaires de base de données
		$this->getDb($idBase);
    	if(!$this->dbI)$this->dbI = new Models_DbTable_Gevu_instants($this->db);
        if(!$this->dbD)$this->dbD = new Models_DbTable_Gevu_diagnostics($this->db);
        if(!$this->dbL)$this->dbL = new Models_DbTable_Gevu_lieux($this->db);
    	    	
        //création de l'instant
        $idInst = $this->dbI->ajouter(array('id_exi'=>$idExi,'commentaires'=>$comment,'nom'=>'setChoix'),false,$idBase);
        
        //enregsitre les choix
        $oTypeControle = -1;
       	foreach ($params as $p) {
       		if($oTypeControle != $p['id_type_controle']){
	       		//récupère le lieu enfant correspondant au type de controle
	       		$idLieuControle = $this->dbL->getEnfantForTypeControle($idLieu, $p['id_type_controle'], $idInst);
	       		$oTypeControle = $p['id_type_controle'];       			
       		}
       		//ajoute le diagnostique
       		$this->dbD->ajouter(array('id_critere'=>$p['id_critere'],'id_reponse'=>$p['id_reponse'],'id_instant'=>$idInst,'id_lieu'=>$idLieuControle),false);
       	}
        return true;
    }

    /**
     * Enregistre la modification de lieu
     *
     * @param int $idLieu
     * @param array $data
     * @param int $idBase
     * 
     * @return integer
     */
    public function editLieu($idLieu, $data, $idBase){
		
		//initialise les gestionnaires de base de données
		$this->getDb($idBase);
        if(!$this->dbL)$this->dbL = new Models_DbTable_Gevu_lieux($this->db);
    	    	
        return $this->dbL->edit($idLieu, $data);
    }

    /**
     * Enregistre la modification de geo
     *
     * @param int $idLieu
     * @param array $data
     * @param int $idBase
     * 
     * @return integer
     */
    public function editGeo($idLieu, $data, $idBase){
		
		//initialise les gestionnaires de base de données
		$this->getDb($idBase);
        if(!$this->dbG)$this->dbG = new Models_DbTable_Gevu_geos($this->db);
    	    	
        return $this->dbG->edit($idLieu, $data);
    }
    
}

