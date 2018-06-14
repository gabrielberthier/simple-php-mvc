<?php
namespace Controllers;
use Libs\Controller;


class ErrorController extends Controller{

    public function setErrorView($error)
    {
        if(isset($this->view)){
            echo 'true';
        }
        $this->view->render('error', ['error' => $error]);
    }

}