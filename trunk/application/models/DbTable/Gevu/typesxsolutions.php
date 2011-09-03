<?php
/**
 * Ce fichier contient la classe Gevu_typesxsolutions.
 *

 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
*/


/**
 * Classe ORM qui représente la table 'gevu_typesxsolutions'.
 *

 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
 */
class Model_DbTable_Gevu_typesxsolutions extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'gevu_typesxsolutions';
    
    /*
     * Clef primaire de la table.
     */
    protected $_primary = 'id_type_solution';

    /**
     * Vérifie si une entrée Gevu_typesxsolutions existe.
     *
     * @param array $data
     *
     * @return integer
     */
    public function existe($data)
    {
		$select = $this->select();
		$select->from($this, array("id_type_solution"));
		foreach($data as $k=>$v){
			$select->where($k.' = ?', $v);
		}
	    $rows = $this->fetchAll($select);        
	    if($rows->count()>0)$id=$rows[0]["id_type_solution"]; else $id=false;
        return $id;
    } 
        
    /**
     * Ajoute une entrée Gevu_typesxsolutions.
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
     * Recherche une entrée Gevu_typesxsolutions avec la clef primaire spécifiée
     * et modifie cette entrée avec les nouvelles données.
     *
     * @param integer $id
     * @param array $data
     *
     * @return void
     */
    public function edit($id, $data)
    {        
        $this->update($data, 'gevu_typesxsolutions.id_type_solution = ' . $id);
    }
    
    /**
     * Recherche une entrée Gevu_typesxsolutions avec la clef primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public function remove($id)
    {
        $this->delete('gevu_typesxsolutions.id_type_solution = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Gevu_typesxsolutions avec certains critères
     * de tri, intervalles
     */
    public function getAll($order=null, $limit=0, $from=0)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_typesxsolutions") );
                    
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
     * Récupère les spécifications des colonnes Gevu_typesxsolutions 
     */
    public function getCols(){

    	$arr = array("cols"=>array(
	array("titre"=>"id_type_solution","champ"=>"id_type_solution","visible"=>true),
	array("titre"=>"lib","champ"=>"lib","visible"=>true),
    		));    	
    	return $arr;
		
    }     
    
    /*
     * Recherche une entrée Gevu_typesxsolutions avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_type_solution
     */
    public function findById_type_solution($id_type_solution)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_typesxsolutions") )                           
                    ->where( "g.id_type_solution = " . $id_type_solution );

        return $this->fetchRow($query); 
    }
    /*
     * Recherche une entrée Gevu_typesxsolutions avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $lib
     */
    public function findByLib($lib)
    {
        $query = $this->select()
                    ->from( array("g" => "gevu_typesxsolutions") )                           
                    ->where( "g.lib = " . $lib );

        return $this->fetchRow($query); 
    }
    
    
}
