<?php
require '../../db/dbconnect.php';
require '../deleteFiles.php';

$id = '';
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM reward_path WHERE reward_id=$id";
	if(!($res = mysql_query($sql,$con))){
		echo "查询获奖附件路径信息失败！";
		exit(1);
	}
	while($arr = mysql_fetch_array($res)){
		if($arr['rewardcert_path']) {
			$path = "../".$arr['rewardcert_path'];
			deleteFile($path);
		}
	}
	$sql = "DELETE FROM reward_path WHERE reward_id=$id";
	if(!mysql_query($sql)) {
		echo "删除获奖附件路径失败！";
	}
	$sql = "DELETE FROM reward WHERE id=$id";
	if(!mysql_query($sql)) {
		echo "删除获奖信息失败！";
	}
}