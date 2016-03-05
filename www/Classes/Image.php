<?php
namespace App\Classes;


use App\Models\Gallery;
use Imagick;

class Image {

    static public function changeDuplicateName($name)
    {
        while(true){
            if (Gallery::presenceDuplicates('name', mb_substr($name, 0, strpos($name, '.'))) || mb_strlen($name)>127) {
                $name = rand() . ".jpg";
            }else{
                break;
            }
        }
        return $name;
    }
    static public function toMini($dir, $name)
    {
        define("PROPORTIONS", 4/3); //по каким пропорция будет обрезка
        define("NEW_X", 200);   // до какого размера будет уменьшение изображение
        define("NEW_Y", 150);   //

        $a = new Imagick($dir);
        $geo = $a->getImageGeometry();
        $sizeX = $geo['width'];
        $sizeY = $geo['height'];

        if ($sizeX/PROPORTIONS > $sizeY) {
            $newSizeX = $sizeY * PROPORTIONS;
            $newSizeY = $sizeY;
            $x = ($sizeX - $newSizeX) / 2;
            $y = 0;
        }else {
            $newSizeX = $sizeX;
            $newSizeY = $sizeX / PROPORTIONS;
            $x = 0;
            $y = ($sizeY - $newSizeY) / 2;
        }
        $a->cropImage($newSizeX, $newSizeY, $x, $y);
        $a->adaptiveResizeImage(NEW_X, NEW_Y);
        $a->writeImage(__DIR__ . '/../Views/Gallery/Image/Min/' . $name);


    }
}