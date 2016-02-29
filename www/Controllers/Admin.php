<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\News;
use App\Models\User;

class Admin {
    public function actionDeleteNews() {
        $id = $_GET['id'];
        $n = News::getOneById($id);
        $n->delete();
        View::adminPanel();

    }

    public function actionSaveNews() {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
            $new = new News();
            foreach ($_POST as $key => $value) {
                $new->$key = $value;
            }
            $user = User::getUserByUserName($_SESSION['username']);
            $new->user_id = $user->id;
            $new->date=date("Y.m.d H:i:s");
            $new->save();
            View::adminPanel();
        }
    }

    public function actionFormNews()
    {
        $view = new View();
        if (isset($_GET['id'])) {
            $item = News::getOneById($_GET['id']);
            $view->news = $item;
        }
        $view->displayAdmin('News/form.php');
    }

    public function actionAll() {
        $items = News::getAllNewsAndAuthorReverseSort('date');
        $view = new View();
        $view->news = $items;
        $view->displayAdmin('News/all.php');

    }
}