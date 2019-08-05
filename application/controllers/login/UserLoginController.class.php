<?php

class LoginController
{ 
    public function httpGetMethod(Http $http, array $queryFields) 
    {
        return ['bodyClass' => 'home'];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
		$model = new UserModel (new Database());
		$user = $model -> findUserByLogin ($formFields['login']);
            if (is_null($user['id']))
            {
				$http->RedirectTo('/register');
            }
            else
            {
                if (password_verify($formFields['password'], $user['password']))
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
					$http->RedirectTo('/register');	
				}
			}
    }
}