<?php
require '../db/dbconnect.php';
//插入论文信息
function insertPaperInfo($con) {
	$firstauth = $_POST['firstauth'];
	$othauth = $_POST['othauth'];
	$comauth = $_POST['comauth'];
	$name = $_POST['name'];
	$journame = $_POST['journame'];
	$journum = $_POST['journum'];
	$page = $_POST['page'];
	$time = $_POST['time'];
	$adoptime = $_POST['adoptime'];
	$type = $_POST['type'];
	$projectnum = $_POST['projectnum'];
	$state = $_POST['state'];
	$sql = "INSERT INTO paper(id, firstauth, othauth, comauth, name, journame, journum, page, time, adoptime, type, projectnum, state) VALUES('', '$firstauth', '$othauth', '$comauth', '$name', '$journame', '$journum', '$page', '$time', '$adoptime', '$type', '$projectnum', '$state')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}else {
		echo "信息成功上传！<br>";
	}
}
//插入论文附件路径信息
function insertPaperPath($con, $paperScan_name, $paperScan_path, $digitalOrg_name, $digitalOrg_path, $retrivalCert_name, $retrivalCert_path) {
	$sql = "SELECT id FROM paper ORDER BY id DESC";
	if(!($res = mysql_query($sql,$con))) {
		echo "查找论文id出错：".mysql_errno();
		exit(1);
	}
	$row = mysql_fetch_row($res);
	$paper_id = $row[0];
	$sql = "INSERT INTO paper_path(id, paper_id, paperScan_name, paperScan_path, digitalOrg_name, digitalOrg_path, retrivalCert_name, retrivalCert_path) VALUES('', '$paper_id', '$paperScan_name', '$paperScan_path', '$digitalOrg_name', '$digitalOrg_path', '$retrivalCert_name', '$retrivalCert_path')";
	if(!mysql_query($sql,$con)) {
		echo "插入论文附件路径出错：".mysql_errno();
		exit(1);
	}
}
?>