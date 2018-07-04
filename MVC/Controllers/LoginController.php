<?php 

namespace Controllers;

use Libs\Controller;
use Models\UserModel;
use System\Session;

class LoginController extends Controller{
    private $login;

    function __construct()
    {
        parent::__construct();
        $this->login = new UserModel();
    }
    
    public function index(Type $var = null)
    {
        $this->view->render('login/login');
    }

    public function newuser()
    {
        $errors = $this->login->user_is_valid($_POST);
        if(count($errors)){
            $this->view->render('error', ['error'=>$errors]);
            die;
        }
        $this->login->save($_POST);
        header("Location: /login/showuser");
    }

    public function showUser(){
        $data = Session::getInstance();
        $name = $data->name;
        $this->view->render('login/newuser', [ 'user' => $name, 'loggedIn' => TRUE]);
    }

    public function logout()
    {
        Session::getInstance()->destroy();;
        header("Location: /");
    }

}