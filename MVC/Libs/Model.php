<?php 

namespace Libs;
use Libs\Database;
use Libs\Saver;

abstract class Model{
    protected $callable = [], $tablename;

    public abstract function getcallable();

    public abstract function gettablename();

}