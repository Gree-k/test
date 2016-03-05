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


}