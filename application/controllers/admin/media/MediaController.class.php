<?php

class MediaController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'register'];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $model = new MediaModel (new Database());
        $user = $model -> addMedia ("media");
        $http->redirectTo("/admin");
    }
}