<?php
namespace Controllers;
use Libs\Controller;


class ErrorController extends Controller{

    public function setErrorView($error)
    {
        
        $this->view('error', ['error' => $error]);
    }

}