<?php

class ElementController
{

    public function httpGetMethod(Http $http, array $queryFields) 
    {
        $elementModel = new ElementModel(new Database());

        if(isset($queryFields['id']))
        {
            $elementModel->removeElement($queryFields['id']);
            $http->redirectTo('/admin/element');
        }

        
        $elements = $elementModel->findAll();

        return 
        [
            'bodyClass' => 'register',
            'elements'  =>  $elements
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
         $elementModel = new ElementModel(new Database());

        if( !isset($formFields['id']))
        {
            // le mode ajout
            if($http->hasUploadedFile('image') == true)
            {
                $image = $http->moveUploadedFile('image','/images/elements');
            }
            else
            {
                $image = 'no-image.png';
            }

            $elementModel->addElement
            (
                $formFields['name'],
                $formFields['type'],
                $formFields['price'],
                $image
            );

       }
       else
       {
        // le mode modification
            if($http->hasUploadedFile('image') == true)
            {
                $image = $http->moveUploadedFile('image','/images/elements');
            }
            else
            {
                $element = $elementModel->find($formFields['id']);
                $image = $element['image'];
            }

            $elementModel->updateElement
            (
                $formFields['id'],
                $formFields['name'],
                $formFields['type'],
                $formFields['price'],
                $image
            );


       }
        

        $elements = $elementModel->findAll();
        return 
        [
            'bodyClass' => 'register',
             'elements'  =>  $elements
        ];
    }
}