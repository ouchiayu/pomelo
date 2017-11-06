<?php 
if (empty($_GET['order'])) {
	echo "error";
}else{
	include("connMysql.php");
	
	if (!$seldb) die("資料庫選擇失敗");

	$sql_query  = "UPDATE `pomelo_order` SET ";
	$sql_query .= "`order_status` = 'arrive',";
	$sql_query .= "`arrive_time` = '".date("Y-m-d H:i:s")."' ";
	$sql_query .= "WHERE `order_id` = '".$_GET['order']."';";
	mysql_query($sql_query);

	echo "success";
}
?>