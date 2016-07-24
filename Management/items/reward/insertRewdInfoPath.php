<?php
require '../db/dbconnect.php';
//插入获奖信息
function insertRewdInfo($con) {
	$type = $_POST['type'];
	$level = $_POST['level'];
	$name = $_POST['name'];
	$honoree = $_POST['honoree'];
	$time = $_POST['time'];
	$num = $_POST['num'];
	$sql = "INSERT INTO reward(id, type, level, name, honoree, time, num) VALUES('', '$type', '$level', '$name', '$honoree', '$time', '$num')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}else {
		echo "信息成功上传！<br>";
	}
}
//插入获奖附件路径信息
function insertRewdPath($con, $rewardCert_name, $rewardCert_path ) {
	$sql = "SELECT id FROM reward ORDER BY id DESC";
	if(!($res = mysql_query($sql,$con))) {
		echo "查找获奖id出错：".mysql_errno();
		exit(1);
	}
	$row = mysql_fetch_row($res);
	$reward_id = $row[0];
	$sql = "INSERT INTO reward_path(id, reward_id, rewardCert_name, rewardCert_path) VALUES('', '$reward_id', '$rewardCert_name', '$rewardCert_path')";
	if(!mysql_query($sql,$con)) {
		echo "插入获奖附件路径出错：".mysql_errno();
		exit(1);
	}
}
?>