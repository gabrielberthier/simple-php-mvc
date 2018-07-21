<?php 

namespace Controllers;

use Libs\Controller;
use Models\UserModel;
use System\Session;

class DashboardController extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('dashboard/dashboard');
    }


}