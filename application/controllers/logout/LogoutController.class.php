<?php

class LogoutController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $usersession = new UserSession ();
        $usersession -> destroy();
        
        $http -> RedirectTo('/');		
        return ['bodyClass' => 'home'];
    }
}