<?php
namespace App\Controllers;

use App\Classes\Image;
use App\Classes\View;
use App\Models\Gallery as GalleryModel;
use App\Models\User;

class Gallery {
    public function actionAll() {
        $items = GalleryModel::getAllImg();
        $view = new View();
        $view->image = $items;
        $view->display('Gallery/all.php');

    }
    public function actionOne() {
        $id = $_GET['id'];
        $item = GalleryModel::getImgById($id);
        $view = new View();
        $view->image = $item;
        $view->display('Gallery/one.php');
    }

    public function actionSaveImg() {
        if (is_uploaded_file($_FILES['uploadImg']['tmp_name']) && $_FILES['uploadImg']['size'] > 10 * 1024) {
            $arr = ['image/jpg', 'image/jpeg'];
            if (in_array($_FILES['uploadImg']['type'], $arr)) {
                $name= Image::changeDuplicateName($_FILES['uploadImg']['name']);

                $upload = __DIR__ . '/../Views/Gallery/Image/Full/' . basename($name);
                if (move_uploaded_file($_FILES['uploadImg']['tmp_name'], $upload)) {
                    Image::toMini($upload, $name);

                    $link = new GalleryModel();
                    $user = User::getUserByUsername($_SESSION['username']);
                    $link->user_id = $user->id;
                    $link->size = Image::getSize($upload);
                    $link->name = substr($name, 0, strpos($name, '.'));
                    $link->url = '/Views/Gallery/Image/Full/' . $name;
                    $link->url_mini = '/Views/Gallery/Image/Min/' . $name;
                    $link->save();
//                    ('Файл успешно загружен', 'index.php');
                } else {
//                    ('Файл не удалось загрузить', 'index.php');
                }
            } else {
//                ('Выберете файл формата jpg', 'index.php');
            }
        } else {
//            ('Выберете файл больше 10КБ', 'index.php');
        }
        View::galleryPage();
    }
}