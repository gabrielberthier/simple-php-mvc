<?php

namespace Libs;

use \PDO;
use DateTime;
use DateTimeZone;

trait Saver
{

    public function insert_into_mysql()
    {
        try {
            $table = $this->gettablename();

            $inserter = $this->getcallable();

            $db = Model::$db;

            $now = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
            $inserter['entered_in'] = $now->format('Y-m-d H:i:s');
            $str_connector = "INSERT INTO $table ";
            $cols = implode(', ', array_keys($inserter));
            $values = ":" . implode(", :", array_keys($inserter));
            $stmt = $db->prepare("$str_connector ({$cols}) VALUES ({$values})");

            foreach ($inserter as $key => &$value) {
                $stmt->bindParam(":" . $key, $value, PDO::PARAM_STR);
            }
            $value = $stmt->execute();
            if ($value == true) {
                $value = $db->lastInsertId();
            } else {
                $value = false;
            }
            return $value;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            echo "<br>Seu email já está cadastrado";
            die;
        }


    }
}