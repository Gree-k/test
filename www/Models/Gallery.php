<?php
namespace App\Models;

use App\Classes\Base;

/** Реализовать  счетчик лайков*/

class Gallery extends AbstractModel{
    protected static $table = 'st_gallery';

    static public function getAllImg(){
        $bd = new Base();
        $str= 'SELECT * FROM ' . static::$table. ' ORDER BY id DESC';
        $bd->setClassName(get_called_class());
        return $bd->sql_query($str);
    }

    static public function getImgById($id) {
        $bd = new Base();
        $bd->setClassName(get_called_class());
        $str = 'SELECT st_gallery.*, st_user.username FROM ' . static::$table . '
          LEFT OUTER JOIN st_user ON st_gallery.user_id=st_user.id WHERE st_gallery.id=:id';
        $res = $bd->sql_query($str, [':id' => $id]);

        return $res[0];
    }

    static public function getLastImg($start, $limit) {
        $bd = new Base();
        $bd->setClassName(get_called_class());
        $str='SELECT st_gallery.*, st_user.username FROM ' . static::$table . '
          LEFT OUTER JOIN st_user ON st_gallery.user_id=st_user.id
          ORDER BY id DESC LIMIT ' . $start . ', ' . $limit;
        return $bd->sql_query($str);

    }
}