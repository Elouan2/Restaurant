<?php

// class Commande {
//     const displayCommande =
//         'SELECT *, C.`id` AS idCommande
//             FROM `commande` AS C
//             INNER JOIN `user` AS U
//             ON C.`formule` = U.`id`';
//     protected $id;
//     protected $titre;
//     protected $author;
//     protected $date;
//     protected $texte;
//     protected $note;
//     protected $link;
    
//     public function findAll(PDO $db) {
//         $displayBillet = $db->prepare(self::displayCommande);
//         $result = $displayBillet->execute();
//         return $displayBillet->fetchAll();
//     }

//     const displayCommandeSingle =
//         'SELECT *, C.`id` AS idCommande
//             FROM `commande` AS C
//             LEFT JOIN `commentaires` AS C
//             ON B.`id` = C.`link`
//             LEFT JOIN `users` AS U
//             ON B.`author` = U.`id`
//             WHERE B.`id` = ?';

//     public function find(PDO $db, int $id) {
//         $displayCommandeSingle = $db->prepare(self::displayCommandeSingle);
//         $result = $displayCommandeSingle->execute([$id]);
//         return $displayCommandeSingle->fetchAll();
//     }
// }


?>