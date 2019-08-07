<?php

class ElementModel
{

    const QUERY_SELECTELEMENT = 'SELECT *
    FROM element
    WHERE 1';
    
    const QUERY_ADDELEMENT = 'INSERT INTO element (name,type,price,image)
    VALUES(:name,:type,:price,:image)';
    
    const QUERY_DELETEELEMENT = 'DELETE element 
    FROM element
    WHERE id = :id';

    const QUERY_UPDATEELEMENT = 'UPDATE element 
    SET name = :name , type = :type , price = :price , image = :image
    WHERE id = :id';

    const QUERY_GETELEMENT = 'SELECT *
    FROM element
    WHERE id = :id';

    private $db;

    function __construct (Database $database)
    {
        $this->db = $database;
    }

    public function findAll()
    {
        $elements = $this->db->query(self::QUERY_SELECTELEMENT);
        return $elements;
    }

    public function addElement($name,$type,$price,$image)
    {
        $parameters =
        [
            'name'  =>  $name,
            'type'  =>  $type,
            'price'  =>  $price,
            'image'  =>  $image,
        ];


        $this->db->executeSql('INSERT INTO element (name,type,price,image)
    VALUES(:name,:type,:price,:image)' , $parameters);
    }

    public function removeElement($id)
    {
        $this->db->executeSql(self::QUERY_DELETEELEMENT,['id' => $id]);
    }

    public function updateElement($id,$name,$type,$price,$image)
    {
        $parameters =
        [
            'id'    =>  $id,
            'name'  =>  $name,
            'type'  =>  $type,
            'price'  =>  $price,
            'image'  =>  $image,
        ];

        $this->db->executeSql(self::QUERY_UPDATEELEMENT,$parameters);
    } 

    public function find($id)
    {
        $element = $this->db->queryOne(self::QUERY_GETELEMENT,['id' => $id]);
        return($element);           
    }
}

?>