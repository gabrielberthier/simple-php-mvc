<?php 

namespace Libs;

class Database extends \PDO{

    private $host = 'mysql:host=;dbname=projectorium', $user = 'root', $password = '';
    private $conn;

    function __construct()
    {
        $this->conn = $this->get_connection();
    }

    private function get_connection()
    {
        parent::__construct($this->host,$this->user, $this->password);
        return $this->conn;
    }


}