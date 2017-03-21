<?php
set_time_limit(59);

//Создаём директорию если нет (НЕ ЗАБЫТЬ ПЕРЕНЕСТИ В ДРУГОЙ ФАЙЛ ПОТОМ)
$today = date("m.d.Y");
if (file_exists("../../images/" . $today) == false) {
    mkdir("../../images/" . $today);
}

include_once('save.php');

include_once('../db.php');
$db = new Database();

$items = $db->db_select("items","*", "WHERE attachment_hash<>'' AND bad_post=0 AND good_post=0 GROUP BY attachment_hash order by RAND() LIMIT 100");

if(empty($items)){

    exit();

}


foreach ($items as $item) {


    $good_post = 0;
    $wall_id = $item['wall_id'];
    $attachment_hash = $item['attachment_hash'];
    $attachments_json = $item['attachments'];
    $attachments = json_decode($attachments_json);

    for ($i = 0; $i < 10; $i++) {

        if ($attachments[$i] <> "") {
            if (saveimage($attachments[$i], $attachment_hash . "_" . $i)) {
                $good_post = 1;
            }
        }else{
            break;
        }

    }


    if ($good_post == 1){

        $db->db_update("items", "SET good_post=1 WHERE attachment_hash='$attachment_hash'");
    }


}





?>