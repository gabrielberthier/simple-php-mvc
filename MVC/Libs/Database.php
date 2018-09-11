<?php 

namespace Libs;

class Database extends \PDO{

    private $host = 'mysql:host=localhost;dbname=projectorium', $user = 'root', $password = 'maicoçuel do forró';
    private $conn;

    function __construct()
    {
        $this->conn = $this->get_connection();
    }

    private function get_connection()
    {
        return parent::__construct($this->host,$this->user, $this->password);
        //return $this->conn;
    }


}
