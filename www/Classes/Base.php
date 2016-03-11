<?php
namespace App\Classes;

use PDO;

class Base
{
    protected $dbn;
    protected $className = 'stdClass';

    public function __construct() {
        $this->dbn = new PDO('mysql:dbname=a_site;host=localhost', 'root', '');
    }

    public function setClassName($name) {
        $this->className = $name;
    }

    public function findAll($str, $param=[]){
        $sth = $this->dbn->prepare($str);
        $sth->execute($param);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);

    }
    public function findOne($str, $param=[]){
        $sth = $this->dbn->prepare($str);
        $sth->execute($param);
        return $sth->fetchAll()[0];

    }

    public function execute($str, $param=[]){
        $sth = $this->dbn->prepare($str);
        return $sth->execute($param);

    }
}