<?php

namespace Auth;

class Auth{

    private $password, $email;

    public function __construct($email, $password) {
        $this->password = $password;
        $this->email = $email;
    }

    public function getuser()
    {
        return $this->email;
    }

    public function getpassword()
    {
        return $this->password;
    }

}