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
        try{
        $sth = $this->db->prepare('select * FROM users where email = :email');
        $sth->execute(array(':email' => $user->getuser()));
        $received = $sth->fetch(PDO::FETCH_OBJ);
        if(!is_object($received)){
            echo "<script>alert('Cadastre-se');</script>";
            return false;
        }
        if(password_verify($user->getpassword(), $received->password)){
            $this->session->id = $received->id;
            $this->session->name = $received->name;
            return true;
        }
        else{
            return false;
        }
    } catch(\Exception $ex){
        echo("Error! <br>".$ex);

    }
    }

    public function getAuth($id)
    {
        $sth = $this->db->prepare('select * FROM users where id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }



}
