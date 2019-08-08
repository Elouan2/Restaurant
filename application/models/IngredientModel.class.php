<?php

class IngredientModel
{
    

    private $db;

    function __construct (Database $database)
    {
        $this->db = $database;
    }

    public function findAllDish()
    {
        $sql = "SELECT ingredient.* FROM ingredient 
        INNER JOIN type_ingredient
        ON type_ingredient.id = ingredient.idTypeIngredient
        WHERE type_ingredient.name='dish'";

        $bases = $this->db->query($sql);

        return $bases;
    }

    public function findAllIngredient()
    {
        $sql = "SELECT ingredient.*, type_ingredient.name AS ingredient FROM ingredient 
        INNER JOIN type_ingredient
        ON type_ingredient.id = ingredient.idTypeIngredient
        WHERE type_ingredient.name!='dish'
        ORDER BY ingredient.idTypeIngredient";

        $bases = $this->db->query($sql);

        return $bases;
    }
}

?>