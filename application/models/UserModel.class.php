<?php

    final class UserModel {
    const USER = 
        "SELECT U.`id` AS id, `login`, `password`,`firstName`,`lastName`,`mail`,`role`
         FROM `user` AS U
         LEFT JOIN `client` AS C ON C.id = U.id
         LEFT JOIN `steed` AS S ON S.id = U.id
         WHERE `login` = :login";

    private $db;

    function __construct (Database $database) {
        $this->db = $database;
    }

    function findUserByLogin (string $login)
    {
        $parameters['login']= $login;

        $query = $this->db->queryOne(self::USER, $parameters);
        
        return $query;
    }

    function addUser (string $firstName, string $lastName, string $login, string $password, string $mail) {
        $register_main =
            "INSERT INTO `user` (`login`, `password`)  
             VALUES (:login, :password)";
        $register_client =
            "INSERT INTO `client` (`id`, `firstName`, `lastName`, `mail`)  
             VALUES (:id, :firstName, :lastName, :mail)";

        $parameters_main['login']= $login;
        $parameters_main['password'] = password_hash($password, PASSWORD_DEFAULT);
        $key = $this->db->executeSql($register_main, $parameters_main);

        $parameters_client['id']=$key;
        $parameters_client['firstName']=$firstName;
        $parameters_client['lastName']=$lastName;
        $parameters_client['mail']= $mail;
        $key = $this->db->executeSql($register_client, $parameters_client);

        return $key;
    }
}

?>