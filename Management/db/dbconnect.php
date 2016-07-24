<?php
date_default_timezone_set ( "Asia/Shanghai" );
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "mgsystem";
$con = mysql_connect($servername,$username,$password);
if(!$con) {
	die(mysql_error());
} 
mysql_select_db($database,$con);
mysql_query('SET NAMES utf8');
