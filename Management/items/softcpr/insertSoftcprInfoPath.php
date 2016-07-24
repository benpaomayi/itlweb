<?php
require '../db/dbconnect.php';
//插入软件著作权信息
function insertSoftcprInfo($con) {
	$owner = $_POST['owner'];
	$author = $_POST['author'];
	$name = $_POST['name'];
	$time = $_POST['time'];
	$num = $_POST['num'];
	$sql = "INSERT INTO softcpr(id, owner, author, name, time, num) VALUES('', '$owner', '$author', '$name', '$time', '$num')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}else {
		echo "信息成功上传！<br>";
	}
}
//插入软件著作权附件路径信息
function insertSoftcprPath($con, $registerCert_name, $registerCert_path, $application_name, $application_path) {
	$sql = "SELECT id FROM softcpr ORDER BY id DESC";
	if(!($res = mysql_query($sql,$con))) {
		echo "查找软件著作权id出错：".mysql_errno();
		exit(1);
	}
	$row = mysql_fetch_row($res);
	$softcpr_id = $row[0];
	$sql = "INSERT INTO softcpr_path(id, softcpr_id, registerCert_name, registerCert_path, application_name, application_path) VALUES('', '$softcpr_id', '$registerCert_name', '$registerCert_path', '$application_name', '$application_path')";
	if(!mysql_query($sql,$con)) {
		echo "插入软件著作权附件路径出错：".mysql_errno();
		exit(1);
	}
}
?>