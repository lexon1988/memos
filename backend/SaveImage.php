<?php
set_time_limit(3);
ini_set('max_execution_time', 3);
error_reporting(0);


$input=$_GET['input'];
$output=$_GET['output'];


function saveimage($input, $output)
{



    $today = date("m.d.Y");
    // файл и новый размер


    // исходная картинка
    $img = $input;
    // получаем размер картинки
    $size = getimagesize($img);
    $height = $size[1]; // высота
    $width = $size[0]; // ширина
    // картинка, которая будет использована
    // в качестве водяного знака
    $watermark_src = 'watermark.png';
    // получаем размер водяного знака
    $sizeWM = getimagesize($watermark_src);
    $heightWM = $sizeWM[1]; // высота водяного знака
    $widthWM = $sizeWM[0]; // ширина водяного знака
    // задаем прозрачность водяного знака
    $opacity = 80;
    //Загружаем изображения
    $image = imagecreatefromjpeg($img);
    $watermark = imagecreatefrompng($watermark_src);
    // высчитываем координаты, для водяного знака.
    // Внизу справа
    $x = $width - $widthWM;
    $y = $height - $heightWM;
    //Копируем водяной знак на изображение
    imagecopymerge(
        $image, $watermark, $x, $y, 0, 0,
        $widthWM, $heightWM, $opacity
    );
    // задаем заголовок, чтоб вывести результат в браузере
    //header('Content-Type: image/jpeg');
    // выводим картинку
    imagejpeg($image, "../images/".$today."/".$output.".jpg");
    // очищаем память
    imagedestroy($image);
    imagedestroy($watermark);


    unset($filename);
    unset($width);
    unset($height);
    unset($thumb);
    unset($source);
    unset($new_img);
    unset($img);
    unset($size);
    unset($sizeWM);
    unset($heightWM);
    unset($widthWM);
    unset($image);

    return "OK";
}


echo saveimage($input, $output);

?>