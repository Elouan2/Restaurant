<?php

class AccueilController {

public function httpGetMethod(Http $http, array $queryFields) 
{
    return ['bodyClass' => 'carte'];
}
public function httpPostMethod(Http $http, array $formFields) {}

}

