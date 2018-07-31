<?php 

namespace Controllers;

use Libs\Controller;
use Models\UserModel;
use System\Session;
use Services\AuthorizeNewUser;

class SignInController extends Controller{
    
    public function index(Type $var = null)
    {
        $this->view('login/signin');
    }

    public function newuser()
    {
        $authorize = new AuthorizeNewUser();
        $authorize->submit($_POST);
    }

    public function showUser(){
        $data = Session::getInstance();
        $user = (new UserModel())->find($data->id);
        $data->name = $user->name;
        $data->loggedIn = true;
        $this->view('login/newuser', [ 'user' => $user->name, 'loggedIn' => TRUE]);
    }

    public function logout()
    {
        Session::getInstance()->destroy();
        header("Location: /");
    }

}