<?php
chdir ( dirname ( __FILE__ ) );
require 'fileCreation.php';
require '../download/download.php';

session_start();
date_default_timezone_set ( "Asia/Shanghai" );
$filename = date ( "YmdHis" ) . ".txt";
$path = "../documents/temp/" . $filename;
if(isset($_SESSION['string'])) {
	$string = $_SESSION['string'];
	createFile($string, $path);
	download($path);
	unlink($path);
}