<?php

	if(!isset($_SESSION['userName']) && !isset($_SESSION['userEmail']) && isset($_COOKIE['userName']) && isset($_COOKIE['userEmail'])) {
		$_SESSION['userName'] = $_COOKIE['userName'];
		$_SESSION['userEmail'] = $_COOKIE['userEmail'];
	}
	$userName = $_SESSION['userName'];
	$userEmail = $_SESSION['userEmail'];

	if($userName == null || $userEmail == null) {
		header('Location: login.php');
		exit;
	}