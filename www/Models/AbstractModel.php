<?php
namespace App\Models;

use App\Classes\Base;

abstract class AbstractModel {
    protected static $table;
    public $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /** Перенаправление на Добавление, либо Обновление по наличию id */
    public function save() {
        if (isset($this->id)) {
            $this->update();
        }else {
            return $this->add();
        }
    }
    /** Получить все записи отсоритированные в обратном порядке */
    static public function getAllReverseSort($sortItem){
        $bd = new Base();
        $str='SELECT * FROM ' . static::$table . ' ORDER BY ' . $sortItem . ' DESC';
        $bd->setClassName(get_called_class());
        $res = $bd->sql_query($str);
        return $res;
    }

    /** Получить запись по ее id */
    static public function getOneById($id) {
        $class = get_called_class();
        $bd = new Base();
        $bd->setClassName($class);
        $str = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $bd->sql_query($str, [':id' => $id]);

        return $res[0];
    }

    /** Удалить запись по ее id */
    public function delete() {
        $bd = new Base();
        $str ='DELETE FROM ' . static::$table . ' WHERE id=:id';
        $bd->sql_execute($str,[':id'=>$this->id]);
    }

    /** Добавить запись */
    protected function add() {
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

    /** Изменить запись */
    protected function update() {
        $cols= array_keys($this->data);
        $ins = [];
        $params = [];
        foreach ($cols as $col) {
            $params[':' . $col] = $this->data[$col];
            if ($col == 'id') {
                continue;
            }
            $ins[] = $col . '=:' . $col;
        }
        $str = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $ins) . ' WHERE id=:id';
        $bd = new Base();
        $bd->sql_execute($str, $params);
    }

    /** Поиск по заданной записи */
    static public function findByColumn($column, $value) {
        $class = get_called_class();
        $str = 'SELECT * FROM ' . static::$table .
            ' WHERE ' . $column . '=:' . $column;
        $bd = new Base();
        $bd->setClassName($class);
        $res= $bd->sql_query($str , [':' . $column => $value]);

        return $res;
    }

    /** Имеются ли дубликаты в заданном столбце. true/false*/
    static public function presenceDuplicates($column, $value) {
        $bd = new Base();
        $str= 'SELECT EXISTS (SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value)';
        return $bd->sql_queryFetch($str,[':value' => $value])[0];

    }

    static public function countDuplicate($col,$val) {
        $bd = new Base();
        $str='SELECT count(' . $col . ') FROM ' . static::$table . ' WHERE ' . $col . '=:value';
        return $bd->sql_queryFetch($str, [':value' => $val])[0];
    }

    static public function countRow() {
        $bd = new Base();
        $str = 'SELECT count(*) FROM ' . static::$table;
        return $bd->sql_queryFetch($str)[0];
    }

    // под ?
    static public function getLast($start, $limit, $secondTable='', $column='', $elemCompare='') {
        $bd = new Base();
        $bd->setClassName(get_called_class());

        if (empty($secondTable)) {
            $str='SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $start . ', ' . $limit;
        }else{
            $str='SELECT '. static::$table .'.*, '. $secondTable .'.'. $column .' FROM '. static::$table .'
          LEFT OUTER JOIN '. $secondTable .' ON '. static::$table .'.'. $elemCompare .'= '. $secondTable .'.id
          ORDER BY id DESC LIMIT ' . $start . ', ' . $limit;
        }
        return $bd->sql_query($str);

    }
}