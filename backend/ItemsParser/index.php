<?php
set_time_limit(59);

include_once('../curl.php');
include_once('../db.php');
$db = new Database();

for ($k = 0; $k < 22; $k++) {

    $counter1 = file_get_contents("counter1.txt");
    $counter2 = file_get_contents("counter2.txt");

    $gid_file = file("../GidList.txt");
    $gid_file_count = count($gid_file);
    $gid = $gid_file[$counter1];


    if ($counter1 == "" OR $counter1 < $counter2) {
        $counter1 = $counter2;
    }

    if ($counter1 > $gid_file_count) {
        $counter1 = 0;
        $counter2 = 0;
        file_put_contents("counter1.txt", $counter1);
        file_put_contents("counter2.txt", $counter2);
    }


    $api_response = get_content("https://api.vk.com/method/wall.get?owner_id=-" . trim($gid) . "&count=30", 4);
    $items_array = json_decode($api_response);
    //print_r($items_array);

    for ($j = 1; $j < 31; $j++) {

        if ($items_array->response[$j]->id <> "") {
            $is_pinned = $items_array->response[$j]->is_pinned;
            $marked_as_ads = $items_array->response[$j]->marked_as_ads;
            $wall_id = $items_array->response[$j]->to_id . "_" . $items_array->response[$j]->id;

            //Стоит ли ингнорировать данный пост?
            $ignore = 0;
            if (strpos(file_get_contents("ignore.txt"), substr($wall_id, 1)) OR $is_pinned == 1 OR $marked_as_ads == 1) {

                $ignore = 1;

            } else {

                for ($i = 0; $i < 10; $i++) {

                    if (trim($items_array->response[$j]->attachments[$i]->type <> "photo") AND $items_array->response[$j]->attachments[$i]->type <> "") {

                        $ignore = 1;

                    }

                }


                if ($ignore == 1) {

                    $fp = fopen("ignore.txt", "a");
                    $mytext = $wall_id . "\r\n";
                    $test = fwrite($fp, $mytext);
                    fclose($fp);

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

            //Есть ли в базе эта запись? Нужно после того, как временные файлы обнуляться
            if ($update_item == 0 AND $ignore == 0) {

                $wall_id_check = $db->db_select("items", "wall_id", "WHERE wall_id='$wall_id' LIMIT 1");
                if ($wall_id_check[0] <> "") {

                    $fp = fopen("update.txt", "a");
                    $mytext = $wall_id . "\r\n";
                    $test = fwrite($fp, $mytext);
                    fclose($fp);

                    $update_item = 1;

                }
            }


            //Добавить запись
            if ($update_item == 0 AND $ignore == 0) {

                $items_insert_array['wall_id'] = $wall_id;
                $items_insert_array['text'] = $items_array->response[$j]->text;

                // $items_insert_array['attachment'] = $items_array->response[$j]->attachment->photo->src_big;

                $attachments_array = "";
                for ($i = 0; $i < 10; $i++) {

                    if ($items_array->response[$j]->attachments[$i]->photo->src_big <> "") {
                        $attachments_array[] = $items_array->response[$j]->attachments[$i]->photo->src_big;
                    } else {
                        break;
                    }

                }


                $items_insert_array['attachments'] = json_encode($attachments_array);
                $items_insert_array['attachment'] = $attachments_array[0];

                if (trim($items_array->response[$j]->text) <> "") {
                    $items_insert_array['text_hash'] = hash('md5', $items_array->response[$j]->text);
                } else {
                    $items_insert_array['text_hash'] = "";
                }
                $items_insert_array['date'] = $items_array->response[$j]->date;
                $items_insert_array['likes'] = $items_array->response[$j]->likes->count;
                $items_insert_array['reposts'] = $items_array->response[$j]->reposts->count;
                $items_insert_array['rating'] = $items_array->response[$j]->likes->count + $items_array->response[$j]->reposts->count;

                $db->db_insert("items", $items_insert_array);

                if ($items_insert_array['attachment'] == "" AND $items_insert_array['text_hash'] <> "") {

                    $item_hash = $items_insert_array['text_hash'];
                    $db->db_update("items", "SET good_post=1,item_hash='$item_hash' WHERE wall_id='$wall_id'");

                }

                $fp = fopen("update.txt", "a");
                $mytext = $wall_id . "\r\n";
                $test = fwrite($fp, $mytext);
                fclose($fp);

            }


            //Обновить запись
            if ($update_item == 1 AND $ignore == 0) {

                $likes = $items_array->response[$j]->likes->count;
                $reposts = $items_array->response[$j]->reposts->count;
                $rating = $likes + $reposts;

                $db->db_update("items", "SET likes='$likes', reposts='$reposts', rating='$rating' WHERE wall_id='$wall_id'");


            }


        }

    }


    $counter1++;
    file_put_contents("counter1.txt", $counter1);

    $counter2_rand = rand(0, 7);
    if ($counter2_rand == 3) {
        $counter2++;
        file_put_contents("counter2.txt", $counter2);
    }


    unset($counter1);
    unset($counter2);
    unset($gid_file);
    unset($gid_file_count);
    unset($gid);
    unset($api_response);
    unset($items_array);


}

?>