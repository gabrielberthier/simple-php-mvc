<?php

namespace Controllers;

use Libs\Controller;
use Models\UserModel;

class LoginController extends Controller{
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }
    
    public function index(Type $var = null)
    {
        $this->view('login/login');
    }

    public function getuser()
    {
        $name = $_POST["username"];
        $password = $_POST["password"];
        if(empty($name) == true && empty($password)){
            $this->view('error', ['error'=>'Espaços vazios serão banidos!']);
        }
        else{
            if($this->user->login($name, $password)){
                header("Location: /dashboard");
            }
            else{
                $this->view('error', ['error'=>'Não reconhecido!<br>Sua senha ou email estão errados']);
            }
        }
    }
}