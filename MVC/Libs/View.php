<?php
namespace Libs;

class View
{
    function __construct()
    {
        echo "Returning view";
    }

    public function render($path, $vars = [])
    {
        $file = 'views/' . $path;
        if(file_exists($file.'.php')){
            require $file.'.php';
        }
        else if(file_exists($file.'.html')){
            require $file.'.html';
        }
        else{
            die;
        }
        
    }

}