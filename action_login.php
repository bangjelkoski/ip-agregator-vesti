<?php
	include('config.php');

	// Uzmemo POST promenljive od fomre
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Proveravamo da li postoji korisik sa te informacije
	$sql = "SELECT * FROM `korisnici` WHERE `Email` = '". $email ."' AND `Šifra` = '". md5($password) ."' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if($result){
		$korisnik = mysqli_fetch_assoc($result);
		unset($korisnik['Šifra']);
		$_SESSION['user'] = $korisnik;
		header('Location: index.php');
		die();
	}else{
		$_SESSION['error_login'] = true;
		header('Location: ulogovanje.php');
    	die();
	}		

?>