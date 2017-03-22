<?php

set_time_limit(59);


include_once('../curl.php');
include_once('../db.php');
$db = new Database();


$items = $db->db_select('items', "*", "WHERE attachment_hash='' and bad_post=0 order by RAND() LIMIT 60");


if ($items[0] <> "") {

    foreach ($items as $item) {

        $id = $item['id'];
        $text_hash = $item['text_hash'];
        $file_url = urlencode(trim($item['attachment']));
        $attachment_hash = get_content("http://memario/backend/gethash.php?file=" . $file_url, 4);

        if (!empty($attachment_hash) OR $attachment_hash<>"fail") {

            $item_hash = $text_hash . $attachment_hash . "<br>";
            $db->db_update("items", "SET attachment_hash='$attachment_hash', item_hash='$item_hash' WHERE id='$id'");

        }

    }

}


unset($items);


?>