<?php

class ElementModel
{
    const QUERY_SELECTELEMENT = 'SELECT *
    FROM element
    WHERE 1';
    
    const QUERY_ADDELEMENT = 'INSERT INTO element(name,type,price,image)
    VALUES(:name,:type,:price,:image)';

    const QUERY_DELETEELEMENT = 'DELETE element
    FROM element
    WHERE id = :id';

    private $db;

    function __construct (Database $database) {
        $this->db = $database;
    }

    public function findAll()
    {
        $elements = $this->db->query(self::QUERY_SELECTELEMENT);
        return $elements;
    }

    public function addElement($name, $type, $price, $image)
    {
        $parameters = 
        [
            'name' => $name,
            'type' => $type,
            'price' => $price,
            'image' => $image,
        ];

        $this->db->executeSql(self::QUERY_ADDELEMENT,$parameters);
    }

    public function removeElement($id)
    {
        $this->db->executeSql(self::QUERY_DELETEELEMENT,['id' => $id]);
    }

    public function find($id)
    {

    }
}
?>
