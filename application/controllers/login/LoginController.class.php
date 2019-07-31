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

}