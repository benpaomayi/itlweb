<?php
require '../db/dbconnect.php';
//插入专利信息
function insertPatentInfo($con) {
	$inventor = $_POST['inventor'];
	$owner = $_POST['owner'];
	$name = $_POST['name'];
	$time = $_POST['time'];
	$state = $_POST['state'];
	$num = $_POST['num'];
	$sql = "INSERT INTO patent(id, inventor, owner, name, time, state, num) VALUES('', '$inventor', '$owner', '$name', '$time', '$state', '$num')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}else {
		echo "信息成功上传！<br>";
	}
}
//插入专利附件路径信息
function insertPatentPath($con, $appManual_name, $appManual_path, $authManual_name, $authManual_path, $authCert_name, $authCert_path) {
	$sql = "SELECT id FROM patent ORDER BY id DESC";
	if(!($res = mysql_query($sql,$con))) {
		echo "查找专利id出错：".mysql_errno();
		exit(1);
	}
	$row = mysql_fetch_row($res);
	$patent_id = $row[0];
	$sql = "INSERT INTO patent_path(id, patent_id, appmanual_name, appmanual_path, authmanual_name, authmanual_path, authcert_name, authcert_path) VALUES('', '$patent_id', '$appManual_name', '$appManual_path', '$authManual_name', '$authManual_path', '$authCert_name', '$authCert_path')";
	if(!mysql_query($sql,$con)) {
		echo "插入专利附件路径出错：".mysql_errno();
		exit(1);
	}
}
?>