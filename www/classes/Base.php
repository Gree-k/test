<?php
namespace App\Classes;

class Base
{
    protected $dbn;
    protected $className = 'stdClass';

    public function __construct() {
        $this->dbn = new PDO('mysql:dbname=test;host=localhost', 'root', '');
    }

    public function setClassName($name) {
        $this->className = $name;
    }

    public function sql_query($str, $param=[]){
        $sth = $this->dbn->prepare($str);
        $sth->execute($param);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);

    }

    public function sql_execute($str, $param=[]){
        $sth = $this->dbn->prepare($str);
        return $sth->execute($param);


    }
}