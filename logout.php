<?php

	session_start();
	require_once 'build/php/dologin.php';
	$login = new USER();
	// unset($_SESSION['user_session']);
	// unset($_SESSION['username']);
	$login->doLogout();

	if(session_destroy())
	{
		header("Location: login.php");
		exit();
	}

?>