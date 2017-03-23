<?php

set_time_limit(59);

$server_name = $_SERVER['SERVER_NAME'];

include_once('../curl.php');
include_once('../db.php');
$db = new Database();


$items = $db->db_select('items', "id, attachment, text_hash", "WHERE attachment_hash='' AND bad_post=0 AND good_post<>1  ORDER BY RAND() LIMIT 100");

if ($items[0] <> "") {

    foreach ($items as $item) {

        $id = $item['id'];
        $file_url = urlencode(trim($item['attachment']));
        $attachment_hash = get_content("http://" . $server_name . "/backend/gethash.php?file=" . $file_url, 3);

        if (!empty($attachment_hash) OR trim($attachment_hash) <> "") {

            $text_hash = $item['text_hash'];
            $item_hash = $text_hash . $attachment_hash;
            $db->db_update("items", "SET attachment_hash='$attachment_hash', item_hash='$item_hash' WHERE id='$id'");

        } else {

            $db->db_update("items", "SET bad_post=1 WHERE id='$id'");
        }

    }

} else {


    $items = $db->db_select('items', "id, attachment, text_hash", "WHERE attachment_hash='' AND bad_post=1 AND good_post<>1   ORDER BY RAND() LIMIT 100");

    if ($items[0] <> "") {

        foreach ($items as $item) {

            $id = $item['id'];
            $text_hash = $item['text_hash'];
            $file_url = urlencode(trim($item['attachment']));
            $attachment_hash = get_content("http://" . $server_name . "/backend/gethash.php?file=" . $file_url, 3);

            if (!empty($attachment_hash) OR trim($attachment_hash) <> "") {

                $item_hash = $text_hash . $attachment_hash;
                $db->db_update("items", "SET attachment_hash='$attachment_hash', item_hash='$item_hash' WHERE id='$id'");

            }


        }

    }

}

?>