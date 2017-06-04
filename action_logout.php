<?php
	include('config.php');
	$_SESSION['user'] = null;
	header('Location: '. $_SERVER['HTTP_REFERER']);	
	die();
?>