<?php
namespace App\Models;

use App\Classes\Base;

class Comment extends AbstractModel {

    protected static $table = 'st_comment';

    static public function getCommentsByNewsPk($newsId) {
        $bd = new Base();
        $str ='SELECT st_comment.id, st_comment.comment, st_comment.date, st_user.username, st_user.name, st_user.surname
            FROM ' . self::$table . ' LEFT OUTER JOIN st_user ON st_comment.user_id=st_user.id
            WHERE st_comment.articles_id=:id ORDER BY st_comment.date DESC';
        $bd->setClassName(get_called_class());
        $res = $bd->sql_query($str, [':id' => $newsId]);
        return $res;
    }

    public function add() {
        $cols= array_keys($this->data);
        $ins = [];
        foreach ($cols as $col) {
            $ins[':' . $col]=$this->data[$col];
        }
        $str = 'INSERT INTO ' . static::$table .
            '( ' . implode(', ', $cols) . ')
                VALUES
                (' . implode(', ', array_keys($ins)) . ')';

        $bd = new Base();
        return $bd->sql_execute($str, $ins);
    }
}
