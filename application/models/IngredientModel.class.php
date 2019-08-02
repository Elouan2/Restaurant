<?php

class IngredientModel
{
    const QUERY_ADDINGREDIENT = 'SELECT *
    FROM ingredient
    WHERE 1';
    
    const QUERY_DISPATCHER = ' SELECT *
    FROM commande AS C
    INNER JOIN user AS U
    ON C.client_id = U.id;
    WHERE U.role=steed
    AND U.statut=true';

    protected $id;
    protected $client_id;
    protected $price;
    protected $date_order;
    protected $statut;

    public function findAll(PDO $dataBase){
        $query= $dataBase->prepare(QUERY_DISPLAYCOMMANDE);
        $error = $query->execute();
        $result = $query -> fetchAll();
        return $result;
    }

    public function find(PDO $dataBase, int $id){
        $query= $dataBase->prepare(QUERY_DISPLAYSINGLECOMMANDE);
        $error = $query->execute([$id]);
        $result = $query -> fetchAll();
        return $result;
    }
}

?>