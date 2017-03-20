<?php
set_time_limit(59);


function gethash($input)
{
    set_time_limit(3);
    if (!empty($input)) {
        return hash_file('md5', $input);
    }else{
        return "";
    }
}


include_once('../db.php');
$db = new Database();

$items = $db->db_select('items', "*", "WHERE attachment_hash='' and bad_post=0 order by RAND() LIMIT 200");

if ($items[0] <> "") {

    foreach ($items as $item) {

        $bad_post = $item['bad_post'] + 1;

        if ($item['attachment'] <> "" OR $item['text_hash'] <> "") {

            $wall_id = $item['wall_id'];
            $text_hash = $item['text_hash'];
            $attachment_hash = gethash($item['attachment']);
            $item_hash = $text_hash . $attachment_hash;

            if ($item_hash) {
                $db->db_update("items", "SET attachment_hash='$attachment_hash', item_hash='$item_hash' WHERE wall_id='$wall_id'");
            } else {
                $db->db_update("items", "SET bad_post='$bad_post' WHERE wall_id='$wall_id'");
            }
        }
    }

    unset($items);

} else {

    $items = $db->db_select("items", "*", "WHERE bad_post>0 order by RAND() LIMIT 200");

    if ($items[0] <> "") {

        foreach ($items as $item) {

            $bad_post = $item['bad_post'] + 1;

            if ($item['attachment'] <> "" OR $item['text_hash'] <> "") {

                $wall_id = $item['wall_id'];
                $text_hash = $item['text_hash'];
                $attachment_hash = gethash($item['attachment']);
                $item_hash = $text_hash . $attachment_hash;

                if ($item_hash) {

                    $db->db_update("items", "SET attachment_hash='$attachment_hash', item_hash='$item_hash', bad_post=0 WHERE wall_id='$wall_id'");

                } else {

                    $db->db_update("items", "SET bad_post='$bad_post' WHERE wall_id='$wall_id'");

                }
            }

        }

    }

    unset($items);

}


?>