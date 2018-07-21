<?php

namespace Models;
use Libs\Model;
use Libs\Saver;
use Auth\Auth;
use Auth\Authenticate;

class UserModel extends Model{

    protected $callable = [
        'email', 'name', 'surname','password', 'fk_'
    ];

    protected $tablename = 'users';
    
    public function __construct()
    {

    }

    public function user_is_valid($response = array())
    {
        $password = $response['password'];
        $email = $response['email'];
        $name = $response["name"];
        $secondName = $response['surname'];
        $errors = [];
        if (!preg_match("/^[a-zA-Z ]*$/",$name) || !preg_match("/^[a-zA-Z ]*$/",$secondName)) {
        $nameErr = "Use apenas letras e espaços em branco";
        $errors['nameErr'] = $nameErr;
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $errors['emailErr'] = $emailErr;
        }
        else if(strlen($password) < 7){
            $passErr = "Tamanho de senha muito pequeno, use uma maior";
            $errors['passErr'] = $passErr;
        }
        #showUser($email, $password); 
        return $errors;
    }

    public function getcallable()
    {
        return $this->callable;
    }

    public function gettablename(){
        return $this->tablename;
    }

    public function save($response = [])
    {
        $options = [
            'cost' => 15,
        ];
        $saver = new Saver();
        $response['password'] = password_hash($response['password'], PASSWORD_BCRYPT, $options);
        $this->callable = array_flip($this->callable);
        $this->callable = array_intersect_key($response,$this->callable);
        return $saver->insert_into_mysql($this);
    }

    public function login($user,$password)
    {
        $auth = new Auth($user, $password);
        $authenticate = new Authenticate();
        return $authenticate->gotlogged($auth);
        
    }

}