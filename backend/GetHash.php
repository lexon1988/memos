<?php
ini_set('max_execution_time',3);
ini_set ('max_input_time', 3);
set_time_limit(3);


error_reporting(0);

$file=$_GET['file'];
echo hash_file('md5', $file);


?>