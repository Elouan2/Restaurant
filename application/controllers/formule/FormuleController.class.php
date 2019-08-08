<?php

class FormuleController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        $db = new Database();
        $commandeModel = new CommandeModel($db);
        $ingredientModel = new IngredientModel($db);

        $formules = $commandeModel->findAllFormule();
        $bases = $ingredientModel->findAllDish();
        $ingredients = $ingredientModel->findAllIngredient();

        return 
        [
            'formules'      =>  $formules,
            'bodyClass'     => 'home',
            'bases'         =>  $bases,
            'ingredients'   =>  $ingredients
        ];
    }


    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}