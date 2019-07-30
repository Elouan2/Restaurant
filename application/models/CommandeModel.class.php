<?php

function connect($dsL, $user, $pwd){
    $dataBase=new PDO($dsL, $user, $pwd);
    return $dataBase;
}

class Commande {
    const displayCommande =
        // 'SELECT *, B.`id` AS idBillet
        //     FROM `billet` AS B
        //     INNER JOIN `users` AS U
        //     ON B.`author` = U.`id`';
    protected $id;
    protected $titre;
    protected $author;
    protected $date;
    protected $texte;
    protected $note;
    protected $link;

    public function findAll(PDO $db) {
        $displayCommande = $db->prepare(self::displayCommande);
        $result = $displayCommande->execute();
        return $displayCommande->fetchAll();
    }

    const displayCommandeSingle =
        // 'SELECT *, B.`id` AS idBillet
        //     FROM `billet` AS B
        //     LEFT JOIN `commentaires` AS C
        //     ON B.`id` = C.`link`
        //     LEFT JOIN `users` AS U
        //     ON B.`author` = U.`id`
        //     WHERE B.`id` = ?';

    public function find(PDO $db, int $id) {
        $displayCommandeSingle = $db->prepare(self::displayCommandeSingle);
        $result = $displayCommandeSingle->execute([$id]);
        return $displayCommandeSingle->fetchAll();
    }
}

?>
