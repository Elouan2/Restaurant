<?php

function connect($dsL, $user, $pwd){
    $dataBase=new PDO($dsL, $user, $pwd);
    return $dataBase;
}

function displayUser(PDO $dataBase){
    $displayUser =
        // 'SELECT id, `firstname`,`lastname`,`email`,`password`,`role`
        //     FROM `users`';
    $query=$dataBase->prepare($displayUser);
    $error=$query->execute();
    $result=$query->fetchAll();
    return $result;
}
