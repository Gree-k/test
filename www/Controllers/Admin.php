<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\News;

class Admin {
    public function actionDel() {
        $id = $_GET['id'];
        $n = News::getOneById($id);
        $n->delete();
        View::mainPage();

    }

    public function actionSave() {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
            $new = new News();
            foreach ($_POST as $key => $value) {
                $new->$key = $value;
            }
            $new->date=date("Y.m.d H:i:s");
            $new->save();
            View::mainPage();
        }
    }

    public function actionForm()
    {
        $view = new View();
        if (isset($_GET['id'])) {
            $item = News::getOneById($_GET['id']);
            $view->news = $item;
        }
        $view->display('News/form.php');
    }

}