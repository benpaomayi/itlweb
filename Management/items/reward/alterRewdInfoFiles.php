<?php
//修改获奖信息
function alterRewdInfo($con, $id) {
	$type = $_POST['type'];
	$level = $_POST['level'];
	$name = $_POST['name'];
	$honoree = $_POST['honoree'];
	$time = $_POST['time'];
	$num = $_POST['num'];
	$sql = "UPDATE reward SET type='$type', level='$level', name='$name', honoree='$honoree', time='$time', num='$num' WHERE id='$id'";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		return false;
	} else {
		return true;
	}
}
//修改获奖附件
function alterRewdFiles($con, $id, $path) {
	$sql = "SELECT * FROM reward_path WHERE reward_id='$id'";
	if($res = mysql_query($sql, $con)) {
		$arr = mysql_fetch_array($res);
	}
	$rewardCert_name = $arr['rewardcert_name'];
	$rewardCert_path = $arr['rewardcert_path'];
	if(!empty($_FILES['rewardCert']['name'])) {
		$rewardCert = $_FILES['rewardCert'];
		deleteFile($rewardCert_path);
		$rewardCert_name = $rewardCert['name'];
		$rewardCert_path = uploadFiles($rewardCert, $path);
		$sql = "UPDATE reward_path SET rewardcert_name='$rewardCert_name', rewardcert_path='$rewardCert_path' WHERE reward_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	return true;
}
?>