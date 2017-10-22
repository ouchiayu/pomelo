<?php 
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");


$sql_query  = "UPDATE `pomelo_order` SET ";
$sql_query .= "`payment_status` = '2'";
$sql_query .= "WHERE `order_num` = '".$_POST["order_num"]."'";

mysqli_query($sql_query);
echo true;
?>