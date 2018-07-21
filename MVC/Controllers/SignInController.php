<?php 

namespace Controllers;

use Libs\Controller;
use Models\UserModel;
use System\Session;

class SignInController extends Controller{
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = new UserModel();
    }
    
    public function index(Type $var = null)
    {
        $this->view->render('login/signin');
    }

    public function newuser()
    {
        $errors = $this->user->user_is_valid($_POST);
        if(count($errors)){
            $this->view->render('error', ['error'=>$errors]);
            die;
        }
        if($this->user->save($_POST) == true){
            header("Location: /signin/showuser");
        }
        else{
            $this->view->render('error', ['error'=>
            'Seu email já foi cadastrado ou algum outro erro ocorreu durante o login.']);
            Session::getInstance()->destroy();
        }
        
    }

    public function showUser(){
        $data = Session::getInstance();
        $name = $data->name;
        $this->view->render('login/newuser', [ 'user' => $name, 'loggedIn' => TRUE]);
    }

    public function logout()
    {
        Session::getInstance()->destroy();
        header("Location: /");
    }

}