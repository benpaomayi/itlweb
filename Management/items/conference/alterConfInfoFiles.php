<?php
//修改会议信息
function alterConfInfo($con, $id) {
	$name = $_POST['name'];
	$attendee = $_POST['attendee'];
	$position = $_POST['position'];
	$time = $_POST['time'];
	$unit = $_POST['unit'];
	$sql = "UPDATE conference SET name='$name', attendee='$attendee', position='$position', time='$time', unit='$unit' WHERE id='$id'";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		return false;
	} else {
		return true;
	}
}
//修改会议附件
function alterConfFiles($con, $id, $path) {
	$sql = "SELECT * FROM conference_path WHERE conference_id='$id'";
	if($res = mysql_query($sql, $con)) {
		$arr = mysql_fetch_array($res);
	}
	$invitation_name = $arr['invitation_name'];
	$invitation_path = $arr['invitation_path'];
	$receipt_name = $arr['receipt_name'];
	$receipt_path = $arr['receipt_path'];
	$speech_name = $arr['speech_name'];
	$speech_path = $arr['speech_path'];
	if(!empty($_FILES['invitation']['name'])) {
		$invitation = $_FILES['invitation'];
		deleteFile($invitation_path);
		$invitation_name = $invitation['name'];
		$invitation_path = uploadFiles($invitation, $path);
		$sql = "UPDATE conference_path SET invitation_name='$invitation_name', invitation_path='$invitation_path' WHERE conference_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['receipt']['name'])) {
		$receipt = $_FILES['receipt'];
		deleteFile($receipt_path);
		$receipt_name = $receipt['name'];
		$receipt_path = uploadFiles($receipt, $path);
		$sql = "UPDATE conference_path SET receipt_name='$receipt_name', receipt_path='$receipt_path' WHERE conference_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['speech']['name'])) {
		$speech = $_FILES['speech'];
		deleteFile($speech_path);
		$speech_name = $speech['name'];
		$speech_path = uploadFiles($speech, $path);
		$sql = "UPDATE conference_path SET speech_name='$speech_name', speech_path='$speech_path' WHERE conference_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	return true;
}
?>