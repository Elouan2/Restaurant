<?php

class DessertController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'register'];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $model = new DessertModel (new Database());
        $user = $model -> addDessert($formFields['name'], $formFields['unitPrice'], $formFields['base'], $idMedia);
        $http->redirectTo("/admin");
    }
}