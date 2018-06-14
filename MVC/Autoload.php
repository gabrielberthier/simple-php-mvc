<?php

class Autoload
{
    private $ext;
    private function Autoloader($class)
    {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $class = $class.$this->ext;
        if(file_exists($class)){
            require $class;
        }
        else{
            echo "Error";
        }
    }

    public function __construct()
    {
        $this->ext = spl_autoload_extensions('.php');
        spl_autoload_register([$this, 'Autoloader']);
    }
}
