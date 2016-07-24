<?php
require '../../db/dbconnect.php';
require '../deleteFiles.php';

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM patent_path WHERE patent_id=$id";
	if(!($res = mysql_query($sql,$con))){
		echo "查询专利附件路径信息失败！";
		exit(1);
	}
	while($arr = mysql_fetch_array($res)){
		if($arr['appmanual_path']) {
			$path = "../".$arr['appmanual_path'];
			deleteFile($path);
		}
		if($arr['authmanual_path']) {
			$path = "../".$arr['authmanual_path'];
			deleteFile($path);
		}
		if($arr['authcert_path']) {
			$path = "../".$arr['authcert_path'];
			deleteFile($path);
		}
	}
	$sql = "DELETE FROM patent_path WHERE patent_id=$id";
	if(!mysql_query($sql)) {
		echo "删除专利附件路径失败！";
	}
	$sql = "DELETE FROM patent WHERE id=$id";
	if(!mysql_query($sql)) {
		echo "删除专利信息失败！";
	}
}