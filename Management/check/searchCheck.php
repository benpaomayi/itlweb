<?php
session_start ();
if ($_SESSION ["username"] == "user") {
	if($_SESSION['password'] != "user") {
		header ( "Location:login.html" );
		exit ( 0 );
	}
} else if ($_SESSION ["username"] == "admin") {
	if($_SESSION['password'] != "admin") {
		header ( "Location:login.html" );
		exit ( 0 );
	}
} else {
	header ( "Location:login.html" );
	exit ( 0 );
}
?>