<?php

class RegisterController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'home'];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $model = new UserModel (new Database());
        $user = $model -> addUser ($formFields['firstName'], $formFields['lastName'], $formFields['login'], $formFields['password'], $formFields['mail']);
        $http->redirectTo("/carte");
    }

}