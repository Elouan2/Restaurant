<?php

function connect($dsL, $user, $pwd){
    $dataBase=new PDO($dsL, $user, $pwd);
    return $dataBase;
}

function queryAdd(PDO $dataBase, string $table, array $tableau)
{
    unset ($tableau['case']);
    unset ($tableau['submit']);
    $keys = array_keys($tableau);
    $cle = implode(', ', $keys);
    $valeur = implode(', ', array_fill(0, count($keys), '?'));
    $queryAdd= "INSERT INTO $table ($cle) VALUES ($valeur)";
    $query= $dataBase->prepare($queryAdd);
    $parameter = [];
    foreach($tableau as $key => $valeur){
        switch ($key) {
            case 'password':
                $parameter[]= (!empty($valeur)) ? password_hash($valeur, PASSWORD_DEFAULT): NULL;
                break;
            default:
                $parameter[]= (!empty($valeur)) ? $valeur: NULL;
        }
    }
    $error = $query -> execute($parameter);
    return $error;
}

function displayCategory(PDO $dataBase){
    $displayCategory =
        'SELECT * FROM category
            WHERE parent IS NULL';
    $query=$dataBase->prepare($displayCategory);
    $error=$query->execute();
    $result=$query->fetchAll();
    return $result;
}
function displayUser(PDO $dataBase){
    $displayUser =
        'SELECT id, `firstname`,`lastname`,`email`,`password`,`role`
            FROM `users`';
    $query=$dataBase->prepare($displayUser);
    $error=$query->execute();
    $result=$query->fetchAll();
    return $result;
}

function displayBillet(PDO $dataBase){
    $affichage =
        'SELECT *, B.`id` AS idBillet
            FROM `billet` AS B
            INNER JOIN `users` AS U
            ON B.`author` = U.`id`';
    $query=$dataBase->prepare($affichage);
    // var_dump($query); die;
    $error=$query->execute();
    $result=$query->fetchAll();
    return $result;
}

function displayBilletSingle(PDO $dataBase, int $idBillet){
    $singleAffichage =
        'SELECT *, B.`id` AS idBillet
            FROM `billet` AS B
            LEFT JOIN `commentaires` AS C
            ON B.`id` = C.`link`
            LEFT JOIN `users` AS U
            ON B.`author` = U.`id`
            WHERE B.`id` = ?';
    $query=$dataBase->prepare($singleAffichage);
    $error=$query->execute([$idBillet]);
    $result=$query->fetchAll();
    return $result;
}
