<?php 

if ($_SERVER['SERVER_NAME'] == 'pomelo.esy.es') {
	$db_host = "mysql.hostinger.com.hk";
	$db_username = "u797195823_ohmo";
	$db_password = "zo6gp65j";

	$db_link = @mysql_connect($db_host, $db_username, $db_password);

	if (!$db_link) die("資料庫連接失敗");

	mysql_query("SET NAMES 'utf8'");

	$seldb = @mysql_selectdb("u797195823_pomel");

}elseif($_SERVER['SERVER_NAME'] == 'ec2-54-69-99-160.us-west-2.compute.amazonaws.com'){
	$db_host = "127.0.0.1";
	$db_username = "root";
	$db_password = "zo6gp65j";

	$db_link = @mysql_connect($db_host, $db_username, $db_password);

	if (!$db_link) die("資料庫連接失敗");

	mysql_query("SET NAMES 'utf8'");

	$seldb = @mysql_selectdb("pomelo");
}else{
	$db_host = "127.0.0.1";
	$db_username = "root";
	$db_password = "root";

	$db_link = @mysql_connect($db_host, $db_username, $db_password);

	if (!$db_link) die("資料庫連接失敗");

	mysql_query("SET NAMES 'utf8'");

	$seldb = @mysql_selectdb("pomelo");
}
 ?>