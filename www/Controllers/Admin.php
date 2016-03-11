<?php
namespace App\Controllers;

use App\Classes\Image;
use App\Classes\View;
use App\Models\Gallery;
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
            $user = User::getUserByUsername($_SESSION['username']);
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
        define("NEWS_ON_PANEL", 20);
        $page = isset($_GET['page']) ? $_GET['page']-1 : '0';
        $items = News::getLast($page * NEWS_ON_PANEL, NEWS_ON_PANEL, 'st_user', 'username', 'user_id');
        $view = new View();
        $view->news = $items;
        $view->count = News::countRow();
        $view->displayAdmin('News/all.php');

    }
    public function actionOne() {
        $id = $_GET['id'];
        $item = News::getOneById($id);
        $view = new View();
        $view->news = $item;
        $view->displayAdmin('News/one.php');
    }

    public function actionAllImg() {
        define("IMG_ON_PANEL", 7);
        $page = isset($_GET['page']) ? $_GET['page']-1 : '0';
        $images = Gallery::getLast($page * IMG_ON_PANEL, IMG_ON_PANEL, 'st_user', 'username', 'user_id');
        $view = new View();
        $view->images = $images;
        $view->count = Gallery::countRow();
        $view->displayAdmin('Gallery/all.php');
    }

    public function actionDelImg() {
        $id = $_GET['id'];
        $img = Gallery::getOneById($id);
        Image::delImgFile($img->url);
        Image::delImgFile($img->url_mini);
        $img->delete();
        View::adminPanel('AllImg');
    }

    public function actionRenameImg() {
        $image = Gallery::getOneById($_GET['id']);
        $image->url = Image::renameImgFile($image->url, $_POST['name']);
        $image->url_mini = Image::renameImgFile($image->url_mini, $_POST['name']);
        $image->name = trim($_POST['name']);
        $image->save();
        View::adminPanel('AllImg');
    }
}