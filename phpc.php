<?php
error_reporting(-1);
$IParray=array_values(array_filter(explode(',',$_SERVER['HTTP_X_FORWARDED_FOR'])));
$IP=trim($IParray,":f");
echo end($IP);
?>