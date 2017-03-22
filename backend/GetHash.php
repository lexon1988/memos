<?php
set_time_limit(3);
ini_set('max_execution_time',3);
error_reporting(0);

$file=$_GET['file'];
$hash=hash_file('md5', $file);

if(!empty($hash)){
    echo $hash;
}else{
    echo "fail";
}

?>