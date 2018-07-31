<?php 

namespace Services;

use System\Session;
use Models\UserModel;
use Libs\View;


class AuthorizeNewUser
{
    private $user, $session; 
    Use View;

    public function __construct(Type $var = null)
    {
        $this->user = new UserModel();
        $this->session = Session::getInstance();
    }

    public function submit(array $post)
    {
        $errors = $this->user->user_is_valid($post);
        if (count($errors)) {
            $this->view('error', ['error' => $errors]);
            die;
        }
        $val = $this->user->save($post);
        if ($val != false) {

            $this->session->id = $val;
            header("Location: /signin/showuser");
        } else {
            Session::getInstance()->destroy();
            $this->view('error', ['error' =>
                'Seu email já foi cadastrado ou algum outro erro ocorreu durante o login.']);
        }
    }

    public function retrieveuser()
    {
        return $this->user->find($this->session->id);
    }

}
