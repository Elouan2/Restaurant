<?php

class RegisterController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return
        [
            'bodyClass' => 'home',
            '_form'     =>  new RegisterForm()
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        try
        {
            $model = new UserModel (new Database());

            if($model->findUserByLogin($formFields['login']))
            {
                throw new Exception("Il existe déjà un compte utilisateur avec ce login!!");
            }

            $user = $model -> addUser ($formFields['firstName'], $formFields['lastName'], $formFields['login'], $formFields['password'], $formFields['mail']);
    
            $http->redirectTo("/carte");    
        }
        catch(Exception $e)
        {
            $form = new RegisterForm();
            $form->bind($formFields);

            $form->setErrorMessage($e->getMessage());

            return
            [
                'bodyClass' => 'home',
                '_form'     =>  $form
            ]; 
        }
        
    }

}