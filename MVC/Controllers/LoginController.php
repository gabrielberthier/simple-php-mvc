<?php

namespace Controller;

use Libs\Controller;
use Models\UserModel;

class LoginController extends Controller{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new UserModel();
    }
    
    public function index(Type $var = null)
    {
        $this->view->render('login/login');
    }

    public function getuser()
    {
        $name = $_POST["username"];
        $password = $_POST["password"];
        if(empty($name) == true && empty($password)){
            $this->view->render('error', ['error'=>'Espaços vazios serão banidos!']);
        }
        else{
            if($this->user->login($name, $password)){
                header("Location: /dashboard");
            }
            else{
                $this->view->render('error', ['error'=>'Não reconhecido!<br>Sua senha ou email estão errados']);
            }
        }
    }
}