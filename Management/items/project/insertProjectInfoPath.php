<?php
require '../db/dbconnect.php';
//插入项目信息
function insertProjectInfo($con) {
	$name = $_POST['name'];
	$num = $_POST['num'];
	$type = $_POST['type'];
	$owner = $_POST['owner'];
	$cooper = $_POST['cooper'];
	$host = $_POST['host'];
	$sum = $_POST['sum'];
	$other = $_POST['other'];
	$time = $_POST['time'];
	$estabtime = $_POST['estabtime'];
	$quota = $_POST['quota'];
	$papersum = $_POST['papersum'];
	$patentsum = $_POST['patentsum'];
	$sql = "INSERT INTO project(id, name, num, type, owner, cooper, host, sum, other, time, estabtime, quota, papersum, patentsum) VALUES('', '$name', '$num', '$type', '$owner', '$cooper', '$host', '$sum', '$other', '$time', '$estabtime', '$quota', '$papersum', '$patentsum')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	} else {
		echo "信息成功上传！<br>";
	}
}
//插入项目附件路径信息
function insertProjectPath($con, $application_name, $application_path, $endReport_name, $endReport_path, $plan_name, $plan_path, $contract_name, $contract_path, $acceptCert_name, $acceptCert_path) {
	$sql = "SELECT id FROM project ORDER BY id DESC";
	if(!($res = mysql_query($sql,$con))) {
		echo "查找项目id出错：".mysql_errno();
		exit(1);
	}
	$row = mysql_fetch_row($res);
	$project_id = $row[0];
	$sql = "INSERT INTO project_path(id, project_id, application_name, application_path, endreport_name, endreport_path, plan_name, plan_path, contract_name, contract_path, acceptcert_name, acceptcert_path) VALUES('', '$project_id', '$application_name', '$application_path', '$endReport_name', '$endReport_path', '$plan_name', '$plan_path', '$contract_name', '$contract_path', '$acceptCert_name', '$acceptCert_path')";
	if(!mysql_query($sql,$con)) {
		echo "插入项目附件路径出错：".mysql_errno();
		exit(1);
	}
}
?> 	