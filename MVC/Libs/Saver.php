<?php

namespace Libs;
use \PDO;

class Saver{

    private $db;

    public function __construct()
    {
        $this->db = new Database();   
    }
    
    public function insert_into_mysql(Model $model)
    {
        try{ 
        $table = $model->gettablename();
        $str_connector = "INSERT INTO $table ";
        $cols = "";
        $values = "";
        foreach($model->getcallable() as $key => $value){
            $coluns = $key . " ";
            $cols.=$coluns;
            $val = ":$key ";
            $values .= $val;
        }
        $cols = trim($cols);
        $values = trim($values);
        $cols = str_replace(" ", ',', $cols);
        $values = str_replace(" ", ',', $values);
        $stmt = $this->db->prepare("$str_connector ($cols) VALUES ($values)");
        #echo "$str_connector ($cols) VALUES ($values)";
        foreach($model->getcallable() as $key => &$value){
            $stmt->bindParam(":".$key, $value,PDO::PARAM_STR);
            echo(":$key : ". $value."<br>");
        }
        $stmt->execute();
    }
    catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    }



}