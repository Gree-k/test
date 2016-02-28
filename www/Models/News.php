<?php
namespace App\Models;
use App\Classes\Base;

/**
 * Class News
 * @property $id
 * @property $title
 * @property $text
 * @property $date
 */
class News extends AbstractModel{
    protected static $table = 'st_articles';

    static public function getAllNewsAndAuthorReverseSort($sortItem){
        $class = get_called_class();
        $bd = new Base();
        $str='SELECT ' . static::$table. '.*, st_user.login  FROM ' . static::$table . '
            LEFT OUTER JOIN st_user ON st_articles.user_id=st_user.id ORDER BY ' . $sortItem . ' DESC';
        $bd->setClassName($class);
        $res = $bd->sql_query($str);
        return $res;
    }

}