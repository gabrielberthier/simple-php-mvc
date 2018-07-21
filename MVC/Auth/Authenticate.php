<?php

namespace Auth;

use \PDO;
use DateTime;
use DateTimeZone;
use Libs\Database;
use Models\UserModel;
use System\Session;

class Authenticate
{

    private $db, $_SESSION;

    public function __construct()
    {
        $this->db = new Database();
        $this->session = Session::getInstance();
    }

    public function gotlogged(Auth $user)
    {
        $sth = $this->db->prepare('select * FROM users where email = :email');
        $sth->execute(array(':email' => $user->getuser()));
        $received = $sth->fetch(PDO::FETCH_OBJ);
        if(password_verify($user->getpassword(), $received->password)){
            echo "É ISSO AÍ CARALHO";
            $this->session->id = $received->id;
            $this->session->name = $received->name;
            return true;
        }
        else{
            echo "Não funfou <br>";
            return false;
        }
    }

    public function getAuth($id)
    {
        $sth = $this->db->prepare('select * FROM users where id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }



}