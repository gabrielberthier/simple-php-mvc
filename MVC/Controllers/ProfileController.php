<?php

namespace Controllers;

use Libs\Controller;
use Models\UserModel;
use System\Session;
use Auth\Authenticate;

class ProfileController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $session = Session::getInstance();
        if (session_status() == PHP_SESSION_NONE || (!isset($session->name)))
            header('Location: /');
        else{
            $authenticate = new Authenticate();
            $userarray = $authenticate->getAuth($session->id);
            $this->view->render('profile/profile', $userarray);
        }
    }

}