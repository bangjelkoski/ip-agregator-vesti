<?php 
include('config.php');

$naslov = $_POST['naslov'];
$id_korisnika = $_POST['IDKorisnika'];
$kategorije = $_POST['kategorija'];
$sadrzaj = nl2br($_POST['sadrzaj']); $sadrzaj = trim($sadrzaj);
$id = $_POST['IDVesti'];

// Kompresuj kategorije da bi se upisali u bazi
$kat = '';
foreach($kategorije as $key => $value){
	$kat .= $value. ', ';
}
$kat = substr($kat, 0, strlen($kat) - 2);

// Slika za Vest
if($_FILES['photo']['error'] == UPLOAD_ERR_OK){
	$info = $_FILES['photo']['tmp_name'];
	$ext = end((explode(".", $_FILES['photo']['name'])));;
	$photo = uniqid() . '.' .$ext; 
	$target = BASE_DIR . 'vesti/slike/'. $photo;
	move_uploaded_file($_FILES['photo']['tmp_name'], $target);
}else{
	$photo = "no_image_post.png";
}

// Unesi podatke u databazu
$sql = "UPDATE `vesti` SET `Naslov` = '". $naslov ."', `PodKategorija` = '". $kat ."' WHERE `IDVesti` = ". $id .";";
mysqli_query($conn, $sql);

// Generiraj html za vest - full
$myFile = "vesti/full/vest-".$id.".html";
$fh = fopen($myFile, 'w');
$html = '<div class="vest-image"><img src="vesti/slike/'. $photo .'"/></div><div class="vest-content">'. $sadrzaj .' ...</div></div>';   
fwrite($fh, $html);

// Generiraj html za vest - long
$myFile = "vesti/long/vest-".$id.".html";
$fh = fopen($myFile, 'w');
$html = '<div class="vest-image"><img src="vesti/slike/'. $photo .'"/></div><div class="vest-content">'. substr($sadrzaj, 0, 70) .' ...</div></div>';   
fwrite($fh, $html);

// Generiraj html za vest - short
$myFile = "vesti/short/vest-".$id.".html";
$fh = fopen($myFile, 'w');
$html = '<div class="image"><img src="vesti/slike/'. $photo .'" /></div>';   
fwrite($fh, $html);

// Generiraj html za vest - top
$myFile = "vesti/top/vest-".$id.".html";
$fh = fopen($myFile, 'w');
$html = '<div class="post-image"><img src="vesti/slike/'. $photo .'" /></div><div class="post-content">'. substr($sadrzaj, 0, 200) .' ...</div>'; 
fwrite($fh, $html);

header('Location: azuriraj_vesti.php');
die();

?>