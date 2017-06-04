<?php
	include('config.php');

	// Uzmemo GET promenljive 
	$id = $_GET['vest'];

	// Brisemo prvo sa databaze
	$sql = "DELETE FROM `vesti` WHERE `IDVesti` = '". $id ."'";
	$result = mysqli_query($conn, $sql);

	// Brisemo fajlove
	$file = 'vesti/full/vest-'. $id .'.html'; unlink($file);
	$file = 'vesti/long/vest-'. $id .'.html'; unlink($file);
	$file = 'vesti/short/vest-'. $id .'.html'; unlink($file);
	$file = 'vesti/top/vest-'. $id .'.html'; unlink($file);

	header('Location: '. $_SERVER['HTTP_REFERER']);	
	die();

?>