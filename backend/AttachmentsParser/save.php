<?php

function saveimage($input, $output) {


set_time_limit (3);

$today = date("m.d.Y");
// файл и новый размер
$filename = $input;
$percent = 1;

// получение нового размера
if (list($width, $height) = getimagesize($filename)) {
    $newwidth = $width;
    $newheight = $height;

    // загрузка
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filename);

    // изменение размера
    $new_img = imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height + 30);

    // вывод
    //imagejpeg($thumb);

    imagejpeg($thumb, "temp.jpg");
    // исходная картинка
    $img = "temp.jpg";
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
    imagejpeg($image, "../../images/".$today."/".$output.".jpg");
    // очищаем память
    imagedestroy($image);
    imagedestroy($watermark);

    unlink("temp.jpg");
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


    return true;
}else{

    return false;
}


}

?>