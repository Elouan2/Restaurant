<?php

class IngredientController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'register'];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $model = new IngredientModel (new Database());
        $user = $model -> addIngredient($formFields['name'], $formFields['unitPrice'], $formFields['base'], $idMedia);
        $http->redirectTo("/admin");
    }
}