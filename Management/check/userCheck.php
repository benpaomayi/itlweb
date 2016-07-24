<?php
session_start ();
if ($_SESSION ["username"] != "user" || $_SESSION['password'] != "user") {
	header ( "Location:login.html" );
	exit ( 0 );
}
?>