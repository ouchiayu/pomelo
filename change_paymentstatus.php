<?php 
include("connMysql.php");

if (!$seldb) die("資料庫選擇失敗");

$sql_query  = "UPDATE `pomelo_order` SET ";
$sql_query .= "`payment_status` = '2'";
$sql_query .= "WHERE `order_id` = '".$_POST["order_num"]."'";

mysql_query($sql_query);

echo 'success';
?>