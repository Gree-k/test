<?php
namespace App\Models;

/**
 * Class News
 * @property $id
 * @property $title
 * @property $text
 * @property $date
 */
class News extends AModel{
    protected static $table = 'news';
}