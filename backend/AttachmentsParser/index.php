<?php
set_time_limit(59);

$server_name= $_SERVER['SERVER_NAME'];

include_once('../curl.php');
include_once('../db.php');



$db = new Database();
$items = $db->db_select("items", "*", "WHERE attachment_hash<>'' AND bad_post=0 AND good_post=0 GROUP BY attachment_hash order by RAND() LIMIT 100");


foreach ($items as $item) {

    $good_post = 0;
    $bad_files = 0;
    $attachment_hash = $item['attachment_hash'];
    $attachments_json = $item['attachments'];
    $attachments = json_decode($attachments_json);

    for ($i = 0; $i < 10; $i++) {

        if ($attachments[$i] <> "") {

            $files_status = get_content("http://".$server_name."/backend/SaveImage.php?input=" . $attachments[$i] . "&output=" . $attachment_hash . "_" . $i, 4);

            if ($files_status <> "OK") {
                $bad_files = 1;

            }
        }

        if($bad_files<>1){ $good_post = 1;}

    }

    if ($good_post == 1) {

        $db->db_update("items", "SET good_post=1 WHERE attachment_hash='$attachment_hash'");
    }


}


?>