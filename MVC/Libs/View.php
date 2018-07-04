<?php
namespace Libs;
use Libs\Message;

class View
{
    private $mesa;
    function __construct()
    {
        
    }

    public function render($path, $vars = [])
    {
        $file = 'views/' . $path;
        if(isset($vars) == true){
            extract($vars);
        }
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