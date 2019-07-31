<?php
class CommandeModel {
    const QUERY_DISPLAYCOMMANDE = 'SELECT *
    FROM commande
    WHERE 1';
    // const QUERY_DISPLAYSINGLECOMMANDE=' SELECT *
    // FROM user AS U
    // INNER JOIN commande AS C
    // ON B.auteur = U.id
    // LEFT JOIN commentaires AS C
    // ON B.id = C.lien
    // WHERE B.id=?';
    const QUERY_DISPATCHER = ' SELECT *
    FROM commande AS C
    inner join user AS U
    on C.client_id = U.id;
    WHERE U.role=livreur
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
    // public function find(PDO $dataBase, int $id){
    //     $query= $dataBase->prepare(QUERY_DISPLAYSINGLECOMMANDE);
    //     $error = $query->execute([$id]);
    //     $result = $query -> fetchAll();
    //     return $result;
    // }
    public function findAll(PDO $dataBase){
        $query= $dataBase->prepare(QUERY_DISPATCHER);
        $error = $query->execute();
        $result = $query -> fetchAll();
        return $result;
    }
}
?>