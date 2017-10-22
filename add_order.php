<?php 
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set("Asia/Taipei");
include("connMysql.php");


$sql_query = "INSERT INTO `pomelo_order`(`order_time`, `a_name`, `a_phone`, `p_name`, `p_phone`, `p_num`, `p_address`, `p_msg`, `payment_type`, `payment_status`, `order_status`) VALUES";

$i = 1;

// echo json_encode($_POST);

foreach ($_POST["receiver"] as $receiver) {
	$sql_query .= "(";
	$sql_query .= "'".date("Y-m-d H:i:s")."',";	
	$sql_query .= "'".$_POST["p_name"]."',";
	$sql_query .= "'".$_POST["p_phone"]."',";
	$sql_query .= "'".$receiver['a_name']."',";
	$sql_query .= "'".$receiver["a_phone"]."',";
	$sql_query .= "'".$receiver["num"]."',";
	$sql_query .= "'".implode("|", $receiver['address'])."',";
	$sql_query .= "'".$receiver["msg"]."',";
	$sql_query .= "'".$receiver["payment"]."',";

	if ($receiver["payment"] == "cod") {
		$sql_query .= "'',";
	}else{
		$sql_query .= "'0',";
	}

	$sql_query .= "'order'";

	if ($i == count($_POST["receiver"])) {
		$sql_query .= ");";	
	}else{
		$sql_query .= "),";	
	}

	$i++;
}
// echo $sql_query;
$response = mysqli_query($sql_query);
$order_id = mysqli_insert_id();

// echo $order_id;

header("Location: search.php?order=".$_POST["p_phone"]."&success=true");
 
?>