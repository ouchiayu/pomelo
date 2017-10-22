<?php 
if (empty($_POST['cash_who'])) {
	echo "error";
}else{
	include("connMysql.php");
	
	if (!$seldb) die("資料庫選擇失敗");

	$sql_query  = "UPDATE `pomelo_order` SET ";
	$sql_query .= "`cash_who` = '".$_POST['cash_who']."',";
	$sql_query .= "`payment_status` = '1' ";	
	$sql_query .= "WHERE `order_id` = '".$_GET['order']."';";
	mysqli_query($sql_query);

	echo "success";
}
?>