<?php
namespace System;

use Controllers\ErrorController;


class System
{
    private $url, $role, $controller, $method, $args = [];

    public function __construct()
    {
        $this->setUrl();
    }

    private function setUrl()
    {
        $this->url = explode('/', $_SERVER['REQUEST_URI']);
        $this->controller = ($this->url[1] == '') ? 'Index' : $this->url[1];
        if(isset($this->url[2]) && $this->url[2] != ''){
            $this->method = $this->url[2];
        }
        else{
            $this->method = 'index';
        }
        $this->args = (isset($this->url[3]))?$this->url[3]:null;
        $this->insert();
    }
    private function insert()
    {
        $parent = dirname(__DIR__);
        $class = $parent . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $this->controller . 'Controller.php';
        if(file_exists($class)){
            $controller_name = $this->controller . 'Controller';
            $controller_name = '\\Controllers\\' . $controller_name;
            $var = new $controller_name;
            if(method_exists($var, $this->method) && isset($this->args)){
                $var->{$this->method}($this->args);
            }
            elseif(method_exists($var, $this->method)){
                $var->{$this->method}();
            }
            else{
                $error =  new ErrorController();
                $error->setErrorView('Método não encontrado');
            }
        }
        else{
            $error =  new ErrorController();
            $error->setErrorView('Página não encontrada');
        }
    }

}