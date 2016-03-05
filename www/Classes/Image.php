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



     // при пропорциях = 0, обрезка происходить не будет
     // newX и newY задают новые размеры изображения
    static public function toMini($dir, $name, $newX = 200, $newY = 150, $proportions = 4/3)
    {

        $a = new Imagick($dir);
        $geo = $a->getImageGeometry();
        $sizeX = $geo['width'];
        $sizeY = $geo['height'];

        if ($proportions != 0) {
            if ($sizeX/$proportions > $sizeY) {
                $newSizeX = $sizeY * $proportions;
                $newSizeY = $sizeY;
                $x = ($sizeX - $newSizeX) / 2;
                $y = 0;
            }else {
                $newSizeX = $sizeX;
                $newSizeY = $sizeX / $proportions;
                $x = 0;
                $y = ($sizeY - $newSizeY) / 2;
            }
            $a->cropImage($newSizeX, $newSizeY, $x, $y);
        }
        $a->adaptiveResizeImage($newX, $newY);
        $a->writeImage(__DIR__ . '/../Views/Gallery/Image/Min/' . $name);


    }
}