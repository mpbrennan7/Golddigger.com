<?php
	session_unset();
	$_SESSION = array();
	session_destroy();
	
	header('Location: LoginPage.html');
?>