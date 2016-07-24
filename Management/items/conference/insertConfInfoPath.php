<?php
require '../db/dbconnect.php';
//插入会议信息
function insertConfInfo($con) {
	$name = $_POST['name'];
	$attendee = $_POST['attendee'];
	$position = $_POST['position'];
	$time = $_POST['time'];
	$unit = $_POST['unit'];
	$sql = "INSERT INTO conference(id, name, attendee, position, time, unit) VALUES('', '$name', '$attendee', '$position', '$time', '$unit')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}else {
		echo "信息成功上传！<br>";
	}
}
//插入会议附件路径信息
function insertConfPath($con, $invitation_name, $invitation_path, $receipt_name, $receipt_path, $speech_name, $speech_path) {
	$sql = "SELECT id FROM conference ORDER BY id DESC";
	if(!($res = mysql_query($sql,$con))) {
		echo "查找会议id出错：".mysql_errno();
		exit(1);
	}
	$row = mysql_fetch_row($res);
	$conference_id = $row[0];
	$sql = "INSERT INTO conference_path(id, conference_id, invitation_name, invitation_path, receipt_name, receipt_path, speech_name, speech_path) VALUES('', '$conference_id', '$invitation_name', '$invitation_path', '$receipt_name', '$receipt_path', '$speech_name', '$speech_path')";
	if(!mysql_query($sql,$con)) {
		echo "插入会议附件路径出错：".mysql_errno();
		exit(1);
	}
}
?>