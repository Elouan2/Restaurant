<?php

class LoginController
{ 
    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'home', '_form' => new LoginForm()];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        try
        {
		    $model = new UserModel (new Database());
            $user = $model -> findUserByLogin ($formFields['login']);
            if(empty($user))
            {
                throw new Eception("Il n'y a pas d'utilisateur avec ce login");
            }
            elseif (password_verify($formFields['password'], $user['password']))
            {
			    $session = new UserSession();
                $session->create($user['id'], $user['firstName'], $user['lastName'], $user['mail'], $user['role']);
        
                if ($user['role']=='client')
                {
				    $http->RedirectTo('/carte');
			    }
                else
                {
				    $http->RedirectTo('/admin');
		    	}
            }
            else
            {
                throw new Exception("Le mot de passe n'est pas correct");
                
            }
        }
        catch(Exception $e)
        {
            $form = new LoginForm();
            $form->bind($formFields);

            $form->setErrorMessage($e->getMessage());

            return ['bodyClass' => 'home', '_form' => $form];
        }
    }
}