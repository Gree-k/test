<?php
namespace App\Models;

/**
 * Class News
 * @property $id
 * @property $title
 * @property $text
 * @property $date
 */
class News extends AbstractModel{
    protected static $table = 'News';
}