<?php
require '../db/dbconnect.php';
require '../check/searchCheck.php';
$name = $_SESSION['name'];
$table = '';
if(isset($_POST['psw01']) && isset($_POST['psw02'])) {
	$psw01 = md5(addslashes($_POST['psw01']));
	$psw02 = md5(addslashes($_POST['psw02']));
	if($psw01 !== $psw02) {
		echo "两个密码不一致！";
		exit(1);
	}
	if($_SESSION['username'] == 'admin') {
		$table = 'admininfo';
	} else if($_SESSION['username'] == 'user') {
		$table = 'userinfo';
	}
	$sql = "UPDATE $table SET password='$psw01' where username='$name'";
	if(!mysql_query($sql,$con)) {
		echo "修改密码失败！";
		exit(1);
	} else {
		echo "修改密码成功！";
	}
} else {
	exit(1);
}