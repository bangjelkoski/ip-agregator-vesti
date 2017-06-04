<?php
	include('config.php');

	// Uzmemo POST promenljive od forme
	$email = $_POST['email'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$comment = $_POST['comment'];

	// Slika korisnika
	if($_FILES['photo']['error'] == UPLOAD_ERR_OK){
		$info = $_FILES['photo']['tmp_name'];
		$ext = end((explode(".", $_FILES['photo']['name'])));;
		$photo = uniqid() . '.' .$ext; 
		$target = BASE_DIR . 'images/'. $photo;
		move_uploaded_file($_FILES['photo']['tmp_name'], $target);
	}else{
		$photo = "no_image.png";
	}

	// Kreiranje korisnika
    $sql = "INSERT INTO `korisnici` (`IDKorisnika`, `Ime`, `Prezime`, `Email`, `Šifra`, `Mobilni`, `Adresa`, `Slika`, `Komentar`) VALUES (NULL, '". $first_name ."', '". $last_name ."', '". $email ."', '". md5($password) ."', '". $phone ."', '". $address ."', '". $photo ."', '". $comment ."');";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['register_success'] = true;
		header('Location: ulogovanje.php');
    	die();
    }else{
        $_SESSION['error_register'] = true;
		header('Location: registracija.php');
    	die();
    }	
?>