<?php
include_once('../db.php');
$db = new Database();


$api_response = file_get_contents("https://api.vk.com/method/wall.get?owner_id=-99811617&count=30");
$items_array = json_decode($api_response);

//print_r($items_array);

$is_pinned = $items_array->response[1]->is_pinned;
$marked_as_ads = $items_array->response[1]->marked_as_ads;
$wall_id = $items_array->response[1]->to_id . "_" . $items_array->response[1]->id;

//Стоит ли ингнорировать данный пост?
$ignore = 0;


if (strpos(file_get_contents("ignore.txt"), substr($wall_id, 1)) OR $is_pinned == 1 OR $marked_as_ads == 1) {

    $ignore = 1;

} else {

    for ($i = 0; $i < 10; $i++) {


        if (trim($items_array->response[1]->attachments[$i]->type <> "photo") AND $items_array->response[1]->attachments[$i]->type <> "") {

            $ignore = 1;
            $fp = fopen("ignore.txt", "a");
            $mytext = $wall_id . "\r\n";
            $test = fwrite($fp, $mytext);
            fclose($fp);


        }

    }

}


//Добавить или обновить запись?
$update_item = 0;


if ($ignore == 0) {

    if (strpos(file_get_contents("update.txt"), substr($wall_id, 1))) {

        $update_item = 1;

    } else {

        $update_item = 0;

    }

}


//Добавить запись
if ($update_item == 0 AND $ignore==0) {

    $items_insert_array['wall_id'] = $wall_id;
    $items_insert_array['text'] = $items_array->response[1]->text;

    $items_insert_array['attachment'] = $items_array->response[1]->attachment->photo->src_big;

    $attachments_array = "";
    for ($i = 0; $i < 10; $i++) {

        if ($items_array->response[1]->attachments[$i]->photo->src_big <> "") {
            $attachments_array[] = $items_array->response[1]->attachments[$i]->photo->src_big;
        } else {
            break;
        }

    }

    $items_insert_array['attachments'] = json_encode($attachments_array);
    $items_insert_array['text_hash'] = hash('md5', $items_array->response[1]->text);
    $items_insert_array['likes'] = $items_array->response[1]->likes->count;
    $items_insert_array['reposts'] = $items_array->response[1]->reposts->count;
    $items_insert_array['rating'] = $items_array->response[1]->likes->count + $items_array->response[1]->reposts->count;

    $db->db_insert("items", $items_insert_array);

    $fp = fopen("update.txt", "a");
    $mytext = $wall_id . "\r\n";
    $test = fwrite($fp, $mytext);
    fclose($fp);

}


//Обновить запись
if ($update_item == 1  AND $ignore==0) {

    $likes = $items_array->response[1]->likes->count;
    $reposts = $items_array->response[1]->reposts->count;
    $rating = $items_array->response[1]->likes->count + $items_array->response[1]->reposts->count;

    $db->db_update("items", "SET likes='$likes', reposts='$reposts', rating='$rating' WHERE wall_id='$wall_id'");


}


?>