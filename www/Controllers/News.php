<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\Comment;
use App\Models\News as NewsModel;
use App\Models\User;


class News {

    public function actionAll() {
        define("NEWS_ON_PAGE", 5);
        $page = isset($_GET['page']) ? $_GET['page']-1 : '0';
        $items=NewsModel::getLast($page * NEWS_ON_PAGE, NEWS_ON_PAGE, 'st_user', 'username', 'user_id');
        foreach ($items as &$obj) {
            foreach ($obj as &$one) {
                $one['countComm']=Comment::countDuplicate('articles_id', $one['id']);
            }
        }
        $view = new View();
        $view->news = $items;
        $view->count = NewsModel::countRow();
        $view->display('News/all.php');

    }

    public function actionOne() {
        $id = $_GET['id'];
        $item = NewsModel::getOneById($id);
        $com = Comment::getCommentsByNewsPk($item->id);
        $item->data['countComm']=count($com);
        $view = new View();
        $view->news = $item;
        $view->comments = $com;
        $view->display('News/one.php');
    }

    public function actionAddCommentToNews() {
        if (!empty($_POST['comment'])) {
            $com = new Comment();
            foreach ($_POST as $key => $value) {
                $com->$key = $value;
            }
            $user = User::getUserByUsername($_SESSION['username']);
            $com->user_id = $user->id;
            $com->date=date("Y.m.d H:i:s");
            $com->add();
            header('Location: /index.php?cont=News&act=One&id=' . $_POST['articles_id'] . '#commentAnchor');
        }
    }
}