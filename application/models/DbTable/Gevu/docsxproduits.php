<?php
/**
 * Ce fichier contient la classe Gevu_docsxproduits.
 *

 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
*/


/**
 * Classe ORM qui représente la table 'gevu_docsxproduits'.
 *

 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
 */
class Models_DbTable_Gevu_docsxproduits extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'gevu_docsxproduits';
    
    /*
     * Clef primaire de la table.
     */
    protected $_primary = 'id_doc';

    
    /**
     * Vérifie si une entrée Gevu_docsxproduits existe.
     *
     * @param array $data
     *
     * @return integer
     */
    public function existe($data)
    {
		$select = $this->select();
		$select->from($this, array('id_doc'));
		foreach($data as $k=>$v){
			$select->where($k.' = ?', $v);
		}
	    $rows = $this->fetchAll($select);        
	    if($rows->count()>0)$id=$rows[0]->id_doc; else $id=false;
        return $id;
    } 
        
    /**
     * Ajoute une entrée Gevu_docsxproduits.
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
     * Recherche une entrée Gevu_docsxproduits avec la clef primaire spécifiée
     * et modifie cette entrée avec les nouvelles données.
     *
     * @param integer $id
     * @param array $data
     *
     * @return void
     */
    public function edit($id, $data)
    {        
        $this->update($data, 'gevu_docsxproduits.id_doc = ' . $id);
    }
    
    /**
     * Recherche une entrée Gevu_docsxproduits avec la clef primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public function remove($id)
    {
        $this->delete('gevu_docsxproduits.id_doc = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Gevu_docsxproduits avec certains critères
     * de tri, intervalles
     */
    public function getAll($order=null, $limit=0, $from=0)
    {
        $query = $this->select()
                    ->from( array("gevu_docsxproduits" => "gevu_docsxproduits") );
                    
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


    /*
     * Recherche une entrée Gevu_docsxproduits avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_doc
     */
    public function findById_doc($id_doc)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_docsxproduits") )                           
                    ->where( "g.id_doc = ?", $id_doc );

        return $this->fetchAll($query)->toArray(); 
    }
    /*
     * Recherche une entrée Gevu_docsxproduits avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_produit
     */
    public function findByIdProduit($id_produit)
    {
        $query = $this->select()
        	->setIntegrityCheck(false) //pour pouvoir sélectionner des colonnes dans une autre table
            ->from( array("g" => "gevu_docsxproduits"))
            ->joinInner(array('d' => 'gevu_docs'),
            	'd.id_doc = g.id_doc')
            ->where( "g.id_produit = ?", $id_produit);
    
        return $this->fetchAll($query)->toArray();     
    }
    /*
     * Recherche une entrée Gevu_docsxproduits avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_instant
     */
    public function findById_instant($id_instant)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_docsxproduits") )                           
                    ->where( "g.id_instant = ?", $id_instant );

        return $this->fetchAll($query)->toArray(); 
    }
    
    
}
