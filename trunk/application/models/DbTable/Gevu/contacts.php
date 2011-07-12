<?php
/**
 * Ce fichier contient la classe Gevu_contacts.
 *
 * @copyright  2008 Gabriel Malkas
 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
*/


/**
 * Classe ORM qui représente la table 'gevu_contacts'.
 *
 * @copyright  2008 Gabriel Malkas
 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
 */
class Model_DbTable_Gevu_contacts extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'gevu_contacts';
    
    /*
     * Clef primaire de la table.
     */
    protected $_primary = 'id_contact';

    
    /**
     * Vérifie si une entrée Gevu_contacts existe.
     *
     * @param array $data
     *
     * @return integer
     */
    public function existe($data)
    {
		$select = $this->select();
		$select->from($this, array('id_contact'));
		foreach($data as $k=>$v){
			$select->where($k.' = ?', $v);
		}
	    $rows = $this->fetchAll($select);        
	    if($rows->count()>0)$id=$rows[0]->id_contact; else $id=false;
        return $id;
    } 
        
    /**
     * Ajoute une entrée Gevu_contacts.
     *
     * @param array $data
     * @param boolean $existe
     *  
     * @return integer
     */
    public function ajouter($data, $existe=true)
    {
    	$id=false;
    	if($existe)$id = $this->existe($data);
    	if(!$id){
    	 	$id = $this->insert($data);
    	}
    	return $id;
    } 
           
    /**
     * Recherche une entrée Gevu_contacts avec la clef primaire spécifiée
     * et modifie cette entrée avec les nouvelles données.
     *
     * @param integer $id
     * @param array $data
     *
     * @return void
     */
    public function edit($id, $data)
    {        
        $this->update($data, 'gevu_contacts.id_contact = ' . $id);
    }
    
    /**
     * Recherche une entrée Gevu_contacts avec la clef primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public function remove($id)
    {
        $this->delete('gevu_contacts.id_contact = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Gevu_contacts avec certains critères
     * de tri, intervalles
     */
    public function getAll($order=null, $limit=0, $from=0)
    {
        $query = $this->select()
                    ->from( array("gevu_contacts" => "gevu_contacts") );
                    
        if($order != null)
        {
            $query->order($order);
        }

        if($limit != 0)
        {
            $query->limit($limit, $from);
        }

        return $this->fetchAll($query)->toArray();
    }

    /**
     * Récupère les spécifications des colonnes Gevu_contacts 
     */
    public function getCols(){

    	$arr = array("cols"=>array(
    	   	array("titre"=>"id_contact","champ"=>"id_contact","visible"=>true),
    	array("titre"=>"nom","champ"=>"nom","visible"=>true),
    	array("titre"=>"prenom","champ"=>"prenom","visible"=>true),
    	array("titre"=>"fixe","champ"=>"fixe","visible"=>true),
    	array("titre"=>"mobile","champ"=>"mobile","visible"=>true),
    	array("titre"=>"fax","champ"=>"fax","visible"=>true),
    	array("titre"=>"mail","champ"=>"mail","visible"=>true),
    	array("titre"=>"id_exi","champ"=>"id_exi","visible"=>true),
        	
    		));    	
    	return $arr;
		
    }     
    
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_contact
     */
    public function findById_contact($id_contact)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.id_contact = ?", $id_contact );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $nom
     */
    public function findByNom($nom)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.nom = ?", $nom );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $prenom
     */
    public function findByPrenom($prenom)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.prenom = ?", $prenom );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $fixe
     */
    public function findByFixe($fixe)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.fixe = ?", $fixe );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $mobile
     */
    public function findByMobile($mobile)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.mobile = ?", $mobile );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $fax
     */
    public function findByFax($fax)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.fax = ?", $fax );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $mail
     */
    public function findByMail($mail)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.mail = ?", $mail );

        return $this->fetchRow($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_contacts avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_exi
     */
    public function findById_exi($id_exi)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_contacts") )                           
                    ->where( "g.id_exi = ?", $id_exi );

        return $this->fetchRow($query)->toArray(); 
    }
    
    
}