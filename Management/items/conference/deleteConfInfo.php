<?php
require '../../db/dbconnect.php';
require '../deleteFiles.php';

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM conference_path WHERE conference_id=$id";
	if(!($res = mysql_query($sql,$con))){
		echo "查询会议附件路径信息失败！";
		exit(1);
	}
	while($arr = mysql_fetch_array($res)){
		if($arr['invitation_path']) {
			$path = "../".$arr['invitation_path'];
			deleteFile($path);
		}
		if($arr['receipt_path']) {
			$path = "../".$arr['receipt_path'];
			deleteFile($path);
		}
		if($arr['speech_path']) {
			$path = "../".$arr['speech_path'];
			deleteFile($path);
		}
	}
	$sql = "DELETE FROM conference_path WHERE conference_id=$id";
	if(!mysql_query($sql)) {
		echo "删除会议附件路径失败！";
	}
	$sql = "DELETE FROM conference WHERE id=$id";
	if(!mysql_query($sql)) {
		echo "删除会议信息失败！";
	}
}