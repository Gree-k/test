<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\Comment;
use App\Models\News as NewsModel;


class News {
    public function actionAll() {
        $items = NewsModel::getAllNewsAndAuthorReverseSort('date');
        $view = new View();
        $view->news = $items;
        $view->display('News/all.php');

    }

    public function actionOne() {
        $id = $_GET['id'];
        $item = NewsModel::getOneById($id);
        $com = Comment::getCommentsByNewsPk($item->id);
        $view = new View();
        $view->news = $item;
        $view->comments = $com;
        $view->display('News/one.php');
    }
}