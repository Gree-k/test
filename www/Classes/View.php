<?php
namespace App\Classes;

class View {

    public $data=[];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function display($file) {

        foreach ($this->data as $key => $value) {
            $$key = $value;
        }

        include __DIR__ . '/../Views/template.php';
    }

    public static function mainPage() {
        header('Location: /index.php');
    }
}