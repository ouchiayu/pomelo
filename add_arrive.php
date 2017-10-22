<?php 
if (empty($_GET['order'])) {
	echo "error";
}else{
	include("connMysql.php");
	
	
	$sql_query  = "UPDATE `pomelo_order` SET ";
	$sql_query .= "`arrive_time` = '".date("Y-m-d H:i:s")."' ";
	$sql_query .= "WHERE `order_id` = '".$_GET['order']."';";
	mysqli_query($sql_query);

	echo "success";
}
?>