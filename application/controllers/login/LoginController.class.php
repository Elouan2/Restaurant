<?php

class LoginController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'home'];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $model = new UserModel (new Database());
        $user = $model -> addUser ($formFields['login']);
        $http->redirectTo("/login");
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

        }
        $parameters_main['password']= $password;
        $parameters_main['password'] = password_verify($password, PASSWORD_DEFAULT);
        $key = $this->db->executeSql($register_main, $parameters_main);
        var_dump($password); die;
    }
}