<?php 

namespace Libs;
use Libs\Database;

abstract class Model{
    use Saver;use Retriever;

    protected static $db;

    public function getcallable(){
        return $this->callable;
    }

    private function setcallable(array $response){
        $this->callable = array_flip($this->callable);
        $this->callable = array_intersect_key($response,$this->callable);
    }

    public function gettablename(){
        return static::$tablename;
    }

    public function insert(array $response){
        Model::connect();
        $this->setcallable($response);
        return $this->insert_into_mysql();
    }

    public function find($id)
    {
        Model::connect();
        return $this->getFrom($id);
    }

    private static function connect(){
        if(isset(Model::$db))
            return;
        Model::$db = new Database();
    }

}