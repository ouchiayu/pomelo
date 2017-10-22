<?php 
header("Content-Type: text/html; charset=utf-8");
include("connMysql.php");

if (!$seldb) die("資料庫選擇失敗");

if (is_array($_POST["id"])) {
	$id_array = $_POST["id"];
}else{
	$id_array = array($_POST["id"]);
}

foreach ($id_array as $id) {
	$sql_query  = "UPDATE `pomelo_order` SET ";
	$sql_query .= "`order_status` = '".$_POST["status"]."'";
	$sql_query .= "WHERE `order_id` = ".$id;

	mysqli_query($sql_query);
}

echo true;

?>