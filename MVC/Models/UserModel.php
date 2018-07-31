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

    protected static $tablename = 'users';

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

    public function save($response = [])
    {
        $options = [
            'cost' => 15,
        ];
        $response['password'] = password_hash($response['password'], PASSWORD_BCRYPT, $options);
        return UserModel::insert($response);
    }

    public function login($user,$password)
    {
        $auth = new Auth($user, $password);
        $authenticate = new Authenticate();
        return $authenticate->gotlogged($auth);
    }

    

}