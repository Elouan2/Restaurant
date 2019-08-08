<?php

class ElementController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        $elementModel = new ElementModel(new Database());

        if(isset($queryFields['id']))
        {
            $element = $elementModel->find($queryFields['id']);

            $http->sendJsonResponse($element);
        }
       
    }

}