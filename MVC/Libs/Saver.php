<?php

namespace Libs;
use \PDO;
use DateTime;
use DateTimeZone;
use System\Session;

class Saver{

    private $db, $session;

    public function __construct()
    {
        $this->db = new Database();  
        $this->session = Session::getInstance(); 
    }
    
    public function insert_into_mysql(Model $model)
    {
        try {
            $table = $model->gettablename();
            $inserter = $model->getcallable();
            $now = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
            $inserter['entered_in'] = $now->format('Y-m-d H:i:s');
            $str_connector = "INSERT INTO $table ";
            $cols = implode(', ', array_keys($inserter));
            $values = ":" . implode(", :", array_keys($inserter));
            $stmt = $this->db->prepare("$str_connector ({$cols}) VALUES ({$values})");
            
            foreach ($inserter as $key => &$value) {
                $stmt->bindParam(":" . $key, $value, PDO::PARAM_STR);
            }
            
            if($stmt->execute() == true){
                $id = $this->db->lastInsertId();
                $this->session->id = $id;
                $this->session->name = $inserter['name'];
                return true;
            }
            else{
                return false;
            }
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
            echo "<br>Seu email já está cadastrado";
            die;
        }


    }
}