<?php 
if (empty($_POST['atm_num']) || empty($_POST['atm_bank'])) {
	$response['status'] = 'error';
	$response['msg'] = 'null post';
	echo 'error';
}else{
	include("connMysql.php");
	
	if (!$seldb) die("資料庫選擇失敗");

	$sql_query  = "UPDATE `pomelo_order` SET ";
	$sql_query .= "`atm_num` = '".$_POST['atm_num']."',";
	$sql_query .= "`atm_bank` = '".$_POST['atm_bank']."',";
	$sql_query .= "`payment_status` = '1' ";	
	$sql_query .= "WHERE `order_id` = '".$_GET['order']."';";
	mysql_query($sql_query);

	echo 'success';
}
?>