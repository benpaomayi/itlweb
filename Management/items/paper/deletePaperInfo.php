<?php
require '../../db/dbconnect.php';
require '../deleteFiles.php';

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM paper_path WHERE paper_id=$id";
	if(!($res = mysql_query($sql,$con))){
		echo "查询论文附件路径信息失败！";
		exit(1);
	}
	while($arr = mysql_fetch_array($res)){
		if($arr['paperscan_path']) {
			$path = "../".$arr['paperscan_path'];
			deleteFile($path);
		}
		if($arr['digitalorg_path']) {
			$path = "../".$arr['digitalorg_path'];
			deleteFile($path);
		}
		if($arr['retrivalcert_path']) {
			$path = "../".$arr['retrivalcert_path'];
			deleteFile($path);
		}
	}
	$sql = "DELETE FROM paper_path WHERE paper_id=$id";
	if(!mysql_query($sql)) {
		echo "删除论文附件路径失败！";
	}
	$sql = "DELETE FROM paper WHERE id=$id";
	if(!mysql_query($sql)) {
		echo "删除论文信息失败！";
	}
}