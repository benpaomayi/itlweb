<?php
require '../db/dbconnect.php';
mysql_query('SET NAMES UTF8');
//开启Session设置	
session_start();	
if(isset($_POST['username']) && isset($_POST['password']))
{
	$username=str_replace(" ","",$_POST['username']); //去除空格
} else {
	header("Location:login.html");
}
$username = addslashes($_POST['username']);
$passowrd=md5(addslashes($_POST['password']));
$table = '';
if($_POST['type'] == 0) {
	$table = "admininfo";
} else if($_POST['type'] == 1) {
	$table = "userinfo";
}
if ($username && $passowrd)
	{
		$sql = "SELECT * FROM $table WHERE username = '$username' and password='$passowrd'";
		$res = mysql_query($sql);
		$rows=mysql_num_rows($res);
		if($rows)
		{				
			if($table == "admininfo") {
				$_SESSION['username'] = "admin";
				$_SESSION['password'] = "admin";
			} else if($table == "userinfo"){
				$_SESSION['username'] = "user";
				$_SESSION['password'] = "user";
			}
			$_SESSION['name'] = $username;
		} else {
			echo "用户名或密码错误";
		}
	}
?>