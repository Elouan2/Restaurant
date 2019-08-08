<?php

class FormuleController
{
    public function httpGetMethod(Http $http, array $queryFields) 
    {
        $commandeModel = new CommandeModel(new Database());

        $formules = $commandeModel->findAllFormule();
       
        return
        [
            'formules' => $formules,
            'bodyClass' => 'home'
        ];
    }
    public function httpPostMethod(Http $http, array $formFields)
    {
        
    }
}