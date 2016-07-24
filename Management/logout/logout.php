<?php
session_start();
if (isset ( $_POST ['logout'] )) {
	if ($_POST ['logout'] == 'logout') {
		unset ( $_SESSION ["username"] );
	}
}
?>