<?php

set_time_limit("180");

include_once ("curl.php");

//Создаём папки для картинок
$today = date('d.m.Y');
if (file_exists("../images/" . $today) == false) {
    mkdir("../images/" . $today);
}

$tomorrow = date('d.m.Y', strtotime('+1 day'));
if (file_exists("../images/" . $today) == false) {
    mkdir("../images/" . $today);
}
//--

//Удаляем временные файлы
file_put_contents("ItemsParser/ignore.txt","");
file_put_contents("ItemsParser/update.txt","");
//--


//Выкачиваем аватарки сообществ
$gids= file("GidList.txt");
$gids_list="";

foreach ($gids as $gid){

   $gids_list=$gids_list.trim($gid).",";

}

$gids_list=substr($gids_list, 0, -1);

$gids_json= get_content("https://api.vk.com/method/groups.getById?group_ids=".$gids_list,"30");
$gids_array=json_decode($gids_json);


for($i=0;$i<101;$i++){

    $gid= $gids_array->response[$i]->gid;
    $photo= get_content($gids_array->response[$i]->photo,"4");

    if($gid<>"" AND $photo<>""){

        file_put_contents("../images/avatars/".$gid.".jpg",$photo);

    }else{

        break;
    }

}
//--


?>