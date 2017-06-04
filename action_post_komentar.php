<?php 
include('config.php');

$naslov = $_POST['naslov'];
$id_korisnika = $_POST['korisnik'];
$id_vest = $_POST['vest'];
$poruka = nl2br($_POST['poruka']); $poruka = trim($poruka);

// Unesi podatke u databazu
$sql = "INSERT INTO `komentari` (`IDKomentara`, `IDKorisnika`, `IDVesti`, `BrojHejtova`, `BrojLajkova`, `NaslovKomentara`, `TextKomentara`) VALUES (NULL, '". $id_korisnika ."', '". $id_vest ."', '0', '0', '". $naslov ."', '". $poruka ."');";
 mysqli_query($conn, $sql);


header('Location: '. $_SERVER['HTTP_REFERER']);	
die();

?>