<?php
header('Content-Type: text/html; charset=utf-8'); 

/*---------------------------------------------------------------------------|
|------------------------ Globalne Promenljive i Konstante  -----------------|
|------------------------ User - Trenutni korisnik  -------------------------|
|------------------------ Conn - Konekcija ka bazi  -------------------------|
|---------------------------------------------------------------------------*/
global $user, $conn;
define('BASE_DIR', dirname(__FILE__).'/');


/*---------------------------------------------------------------------------|
|-------------- Povezujemo korisnik sa sesijom ako je ulogovan --------------|
|---------------------------------------------------------------------------*/

// Pokrecemo sesiju
if(!session_id()) session_start();

// Uzimamo tekuci korisnik ako postoji
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;


/*---------------------------------------------------------------------------|
|------------------ Povezujemo se sa databazom, -----------------------------|
|---------------- i selektujemo databazu u globalnu promenljvu --------------|
|---------------------------------------------------------------------------*/
global $db;

// Povezujemo se sa databazom
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn) {
  die('Nastala je greska pri povezivanje sa databazom: ' . mysqli_error());
}

// Ako postoji, izaberi postojecu databazu
$db = mysqli_select_db($conn, 'portalvesti_g15');
mysqli_set_charset($conn, 'UTF8');
if(!$db){
	echo 'Databaza ne postoji, sad cemo vas redirektirati ka inicijalizaciju (kreiranju) databaze!';
	header('refresh:3;url=databaza_init.php');
    die();
}


/*---------------------------------------------------------------------------|
|-------------------- Kategorije i Nihova imena -----------------------------|
|---------------------------------------------------------------------------*/
$const_kategorije = [
	'1'   => 'Ekonomija',
	'1_1' => 'Ekonomija - Privreda',
	'1_2' => 'Ekonomija - Finansije',
	'1_3' => 'Ekonomija - Biznis',
	'2'   => 'Politika',
	'2_1' => 'Politika - Domaća',
	'2_2' => 'Politika - Regionalna',
	'2_3' => 'Politika - Svet',
	'3'   => 'Tehnologije',
	'3_1' => 'Tehnologije - Software',
	'3_2' => 'Tehnologije - Komunikacije',
	'3_3' => 'Tehnologije - Energetika',
	'4'   => 'Sport',
	'4_1' => 'Sport - Fudbal',
	'4_2' => 'Sport - Košarka',
	'4_3' => 'Sport - Tenis',
	'4_4' => 'Sport - Atletika',
	'5'   => 'Kultura',
	'5_1' => 'Kultura - Film',
	'5_2' => 'Kultura - Slikarstvo',
	'5_3' => 'Kultura - Muzka',
	'5_4' => 'Kultura - Pozorište',
];




/*---------------------------------------------------------------------------|
|------------------ Pomocne Funkcije  ---------------------------------------|
|---------------------------------------------------------------------------*/

// Korisnik koji je napisao komentar
function getCommentUser($conn, $id){
	$sql = "SELECT * FROM `korisnici` WHERE `IDKorisnika` = '". $id ."'";
	$result = mysqli_query($conn, $sql);
	if($result){
		return mysqli_fetch_assoc($result);
	}else{
		return null;
	}
}

// Uzimanje opcije za pocetnu sa databaze
function getSetting($conn, $key){
	$sql = "SELECT * FROM `opcije` WHERE `Blok` = '". $key ."'";
	$result = mysqli_query($conn, $sql);
	if($result){
		return mysqli_fetch_assoc($result);
	}else{
		return null;
	}

}

// Setiranje opcije za pocetnu u databazu
function setSetting($conn, $key, $settings){
	$sql = "UPDATE `opcije` SET `Kategorija` = '". $settings['Kategorija'] ."', `Sortiranje` = '". $settings['Sortiranje'] ."', `Broj` = '". $settings['Broj'] ."' WHERE `Blok` = '". $key ."';";
	$result = mysqli_query($conn, $sql);
	return;
}

// Uzimamo vesti za dati blok
function getVesti($conn, $key){

	// Blok za koji trazimo vesti
	$sql = "SELECT * FROM `opcije` WHERE `Blok` = '". $key ."'";
	$result = mysqli_query($conn, $sql);

	// Ako postoji blok
	if($result){
		$result = mysqli_fetch_assoc($result);

		// Sortiranje - default je po datumu
		$order = "ORDER BY `datum` ASC";
		switch($result['Sortiranje']){
			case '1': $order = "ORDER BY `datum` DESC"; break;
			case '3': $order = "ORDER BY `BrojLajkova` DESC"; break;
		}

		// Ako postoji neka kategorija (ako nije blok A ili B)
		if($result['Kategorija']){
			$duzina = strlen($result['Kategorija']);
			if($result['Sortiranje'] == '2'){
				if($duzina > 1){
					$sql = "SELECT vest.* FROM `vesti` vest LEFT JOIN `komentari` as komentar on vest.IDVesti = komentar.IDVesti WHERE `PodKategorija` LIKE '%". $id ."%' GROUP BY vest.IDVesti ORDER BY COUNT(*) LIMIT ". $result['Broj']."";
				}else{
					$sql = "SELECT vest.* FROM `vesti` vest LEFT JOIN `komentari` as komentar on vest.IDVesti = komentar.IDVesti WHERE `PodKategorija` LIKE '%". $id ."_%' GROUP BY vest.IDVesti ORDER BY COUNT(*) LIMIT ". $result['Broj']."";
				}
			}else{
				if($duzina > 1){
					$sql = "SELECT * FROM `vesti` WHERE `PodKategorija` LIKE '%". $result['Kategorija'] ."%'". $order ." LIMIT " .$result['Broj'];
				}else{
					$sql = "SELECT * FROM `vesti` WHERE `PodKategorija` LIKE '%". $result['Kategorija'] ."_%'". $order ." LIMIT " .$result['Broj'];
				}
			}
		}else{
			if($result['Sortiranje'] == '2'){
				$sql = "SELECT vest.*, COUNT(*) as count FROM `vesti` vest LEFT JOIN `komentari` as komentar on vest.IDVesti = komentar.IDVesti GROUP BY vest.IDVesti ORDER BY count DESC LIMIT ". $result['Broj']."";
			}else{
				$sql = "SELECT * FROM `vesti` ". $order ." LIMIT " .$result['Broj'];
			}
		}

		// Uzimamo vesti i vracamo ih nazad (ako postoje)
		$vesti = mysqli_query($conn, $sql);
		if($vesti){
			$result = [];
			foreach ($vesti as $vest){
				$result[] = $vest;
			}
			return $result;
		}else{
			return null;
		}
	}else{
		return null;
	}
}
