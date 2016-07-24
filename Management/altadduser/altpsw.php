<?php
require '../db/dbconnect.php';
require '../check/adminCheck.php';
if(isset($_POST['name']) && isset($_POST['psw01']) && isset($_POST['psw02'])) {
	$name = addslashes($_POST['name']);
	$psw01 = md5(addslashes($_POST['psw01']));
	$psw02 = md5(addslashes($_POST['psw02']));
	$sql = "SELECT * FROM userinfo WHERE username='$name'";
	if($psw01 !== $psw02) {
		echo "两个密码不一致！";
		exit(1);
	}
	if(!($res = mysql_query($sql, $con))) {
		echo mysql_errno();
		exit(1);
	}
	if(mysql_num_rows($res) < 1) {
		echo "不存在此用户名！";
		exit(1);
	}
	$sql = "UPDATE userinfo SET password='$psw01' WHERE username='$name'";
	if(!mysql_query($sql,$con)) {
		echo "修改密码失败！";
		exit(1);
	} else {
		echo "修改密码成功！";
	}
} else {
	exit(1);
}