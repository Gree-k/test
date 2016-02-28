<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\News as NewsModel;


class News {
    public function actionAll() {
        $items = NewsModel::getAllNewsAndAuthorReverseSort('date');
        foreach ($items as $value) {
            foreach ($value as &$val) {
                foreach ($val as $k => &$v) {
                    if ($k == 'date') {
                        $z = explode(' ', $v);
                        $v = date("F j, Y", strtotime($z[0]));
                    }
                }
            }
        }
        $view = new View();
        $view->news = $items;
        $view->display('News/all.php');

    }

    public function actionOne() {
        $id = $_GET['id'];
        $item = NewsModel::getOneById($id);
        $view = new View();
        $view->news = $item;
        $view->display('News/one.php');
    }
}