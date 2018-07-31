<?php 

namespace Controllers;

use Libs\Controller;
use Models\UserModel;
use System\Session;

class DashboardController extends Controller{

    public function index()
    {
        $this->view('dashboard/dashboard');
    }


}