<?php

namespace Libs;

use \PDO;

trait Retriever
{
    public function getFrom($id)
    {
        try {
            $db = Model::$db;
            $sth = $db->prepare('select * FROM ' .$this->gettablename(). ' where id = :id');
            $sth->execute(array(':id' => $id));
            
            return $sth->fetch(PDO::FETCH_OBJ);
        }
        catch (Exception $e){
            throw new \Exception("Algo deu errado");
        }
    }

}