<?php
//修改专利信息
function alterPatentInfo($con, $id) {
	$inventor = $_POST['inventor'];
	$owner = $_POST['owner'];
	$name = $_POST['name'];
	$time = $_POST['time'];
	$state = $_POST['state'];
	$num = $_POST['num'];
	$sql = "UPDATE patent SET inventor='$inventor', owner='$owner', name='$name', time='$time', state='$state', num='$num' WHERE id='$id'";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		return false;
	} else {
		return true;
	}
}
//修改专利附件
function alterPatentFiles($con, $id, $path) {
	$sql = "SELECT * FROM patent_path WHERE patent_id='$id'";
	if($res = mysql_query($sql, $con)) {
		$arr = mysql_fetch_array($res);
	}
	$appManual_name = $arr['appmanual_name'];
	$appManual_path = $arr['appmanual_path'];
	$authManual_name = $arr['authmanual_name'];
	$authManual_path = $arr['authmanual_path'];
	$authCert_name = $arr['authcert_name'];
	$authCert_path = $arr['authcert_path'];
	if(!empty($_FILES['appManual']['name'])) {
		$appManual = $_FILES['appManual'];
		deleteFile($appManual_path);
		$appManual_name = $appManual['name'];
		$appManual_path = uploadFiles($appManual, $path);
		$sql = "UPDATE patent_path SET appmanual_name='$appManual_name', appmanual_path='$appManual_path' WHERE patent_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['authManual']['name'])) {
		$authManual = $_FILES['authManual'];
		deleteFile($authManual_path);
		$authManual_name = $authManual['name'];
		$authManual_path = uploadFiles($authManual, $path);
		$sql = "UPDATE patent_path SET authmanual_name='$authManual_name', authmanual_path='$authManual_path' WHERE patent_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['authCert']['name'])) {
		$authCert = $_FILES['authCert'];
		deleteFile($authCert_path);
		$authCert_name = $authCert['name'];
		$authCert_path = uploadFiles($authCert, $path);
		$sql = "UPDATE patent_path SET authcert_name='$authCert_name', authcert_path='$authCert_path' WHERE patent_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	return true;
}
?>