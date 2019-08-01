<?php

class UserSession
{
	public function __construct()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
      // Démarrage du module PHP de gestion des sessions.
			session_start();
		}
	}

    public function create($id, $firstName, $lastName, $mail, $role)
    {
        // Construction de la session utilisateur.
        $_SESSION['user'] =
        [
            'id' => $id,
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'mail'     => $mail,
            'role'     => $role
        ];
    }

    public function destroy()
    {
        // Destruction de l'ensemble de la session.
        $_SESSION = array();
        session_destroy();
    }

    public function getEmail()
    {
        if($this->isAuthenticated() == false) {
            return null;
        }
        return $_SESSION['user']['mail'];
    }

    public function getAdmin()
    {
        if($this->isAuthenticated() == false) {
            return null;
        }
        return $_SESSION['user']['role'];
    }


    public function getFirstName() {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['firstName'];
    }


    public function getFullName() {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['firstName'].' '.$_SESSION['user']['lastName'];
    }


    public function getLastName() {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['lastName'];
    }


    public function getUserId() {
        if($this->isAuthenticated() == false)
        {
            return null;
        }
        return $_SESSION['user']['id'];
    }


	public function isAuthenticated()
	{
		if(array_key_exists('user', $_SESSION) == true)
		{
			if($_SESSION['user'] == 33)
			{
                return 33;
            }
            elseif (empty($_SESSION['user']) == false) {
				return true;
            }
        }
		return false;
	}
}
