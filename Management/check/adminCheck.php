<?php
session_start ();
if ($_SESSION ["username"] != "admin" || $_SESSION['password'] != "admin") {
	header ( "Location:login.html" );
	exit ( 0 );
}
?>