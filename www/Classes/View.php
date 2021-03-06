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

    public function displayAdmin($file) {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include __DIR__ . '/../Views/Admin/template.php';
    }

    public static function errorPage() {
        $file = 'error404.php';
        include __DIR__ . '/../Views/template.php';
    }
    public static function mainPage() {
        header('Location: /index.php');
    }
    public static function galleryPage() {
        header('Location: /index.php?cont=Gallery');
    }
    public static function adminPanel($act='All') {
        header('Location: /index.php?cont=Admin&act=' . $act);
    }
}