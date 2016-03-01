<?php
namespace App\Models;

use App\Classes\Base;

/**
 * Class User
 * @package $id
 * @package $access
 * @package $username
 * @package $name
 * @package $surname
 * @package $password
 * @package $date;
 */
class User extends AbstractModel {
    protected static $table = 'st_user';

    static public function getAllUsers() {
        $bd = new Base();
        $str ='SELECT st_user.id, st_lvlaccess.access, username, name, surname, password, date
            FROM ' . self::$table . ' LEFT OUTER JOIN st_lvlaccess ON st_user.lvlaccess_id=st_lvlaccess.id';
        $bd->setClassName(get_called_class());
        $res = $bd->sql_query($str);
        return $res;
    }

    static public function getUserByUsername($username) {
        $bd = new Base();
        $bd->setClassName(get_called_class());
        $str = 'SELECT st_user.id, st_lvlaccess.access, username, name, surname, password, date
            FROM ' . self::$table . ' LEFT OUTER JOIN st_lvlaccess ON st_user.lvlaccess_id=st_lvlaccess.id
            WHERE username=:username';
        $res = $bd->sql_query($str, [':username' => $username]);
        return $res[0];
    }
}