<!DOCTYPE html>
<html lang="rs">
<head>
    <meta charset="UTF-8">
    <title>IP - Projekat</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
      <?php
      header('Content-Type: text/html; charset=utf-8'); 
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
       
      if(! $conn ) {
          die('Could not connect: ' . mysqli_error());
      }
       
      echo 'Uspesno ste se povezali sa phpmyadmin-om <br>';
       
      // Ako postoji, izaberi postojecu databazu
      $db_selected = mysqli_select_db($conn, 'portalvesti_g15');

      if (!$db_selected) {
          // Ako ne postoji databaza, kreiraj je
          $sql = "CREATE DATABASE portalvesti_g15 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
          if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste kreirali databazu <br>";
          } else {
            echo 'Gresku pri kreiranja databaze: ' . mysqli_error($conn) . "<br>";
          }
          $db_selected = mysqli_select_db($conn, 'portalvesti_g15');
      }else{
           echo "Tabela vec postoji \n <br>";
      }
      mysqli_set_charset($conn, 'UTF8');
        
      // Kreiramo tabelu Vesti i kolone
       $sql = "CREATE TABLE IF NOT EXISTS `vesti` (
                  IDVesti int(11) NOT NULL AUTO_INCREMENT,
                  IDKorisnika int(11) DEFAULT NULL,
                  PodKategorija varchar(255) DEFAULT NULL,
                  Naslov varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  BrojHejtova int(11) DEFAULT '0',
                  BrojLajkova int(11) DEFAULT '0',
                  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY (IDVesti)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1";
      if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste kreiral tabelu Vesti! <br>";
      }else{
            echo 'Gresku pri kreiranju tabelu Vesti: ' . mysqli_error($conn) . "<br>";
      }

        // Kreiramo tabelu Korisnici i kolone
       $sql = "CREATE TABLE IF NOT EXISTS `korisnici` (
                  IDKorisnika int(11) NOT NULL AUTO_INCREMENT,
                  Ime varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Prezime varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Email varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Šifra varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Mobilni varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Adresa varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Slika varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  Komentar text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  PRIMARY KEY (IDKorisnika)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1";
      if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste kreiral tabelu Korisnici! <br>";
      }else{
            echo 'Gresku pri kreiranju tabelu Korisnici: ' . mysqli_error($conn) . "<br>";
      }

      // Kreiramo Administrator korisnika
      $sql = "INSERT INTO `korisnici` (`IDKorisnika`, `Ime`, `Prezime`, `Email`, `Šifra`, `Mobilni`, `Adresa`, `Slika`, `Komentar`) VALUES ('1', 'Administrator', 'G15', 'admin@g15.com', '". md5('123456') ."', '+381 666-2133', 'Adresa 123, Beograd, Srbija', 'images/admin.png', 'G15 - Administrator. Bojan Andjelkoski i Askovic Lazar.');";
      if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste kreirali Administratora! <br>";
      }else{
            echo 'Gresku pri kreiranju administratora: ' . mysqli_error($conn) . "<br>";
      }

      // Kreiramo tabelu Korisnici i kolone
       $sql = "CREATE TABLE IF NOT EXISTS `komentari` (
                  IDKomentara int(11) NOT NULL AUTO_INCREMENT,
                  IDKorisnika int(11) DEFAULT NULL,
                  IDVesti int(11) DEFAULT NULL,
                  BrojHejtova int(11) DEFAULT '0',
                  BrojLajkova int(11) DEFAULT '0',
                  NaslovKomentara varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  TextKomentara text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
                  PRIMARY KEY (IDKomentara)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1";
      if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste kreirali tabelu Komentari! <br>";
      }else{
            echo 'Gresku pri kreiranju tabelu Komentari: ' . mysqli_error($conn) . "<br>";
      }

      // Kreiramo tabelu Opciju i kolone i upisujemo podatke
      $sql = "CREATE TABLE IF NOT EXISTS `opcije` (
                  id int(11) NOT NULL,
                  Blok varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  Kategorija varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  Broj int(11) NOT NULL,
                  Sortiranje int(11) NOT NULL,
                  PRIMARY KEY (id)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10";
      if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste kreirali tabelu Opcije! <br>";
      }else{
            echo 'Gresku pri kreiranju tabelu Opcije: ' . mysqli_error($conn) . "<br>";
      }

      // Kreiramo tabelu Opciju i kolone i upisujemo podatke
      $sql = "INSERT INTO `opcije` (`id`, `Blok`, `Kategorija`, `Broj`, `Sortiranje`) VALUES (1, 'D', '1', 5, 1),(2, 'E', '2', 5, 1),(3, 'L', '3', 5, 1),
      (4, 'F', '4', 5, 1),(5, 'G', '5', 5, 1),(6, 'H', '3_1', 5, 1),(7, 'I', '2_1', 5, 1),(8, 'J', '1_2', 5, 1),(9, 'K', '5_2', 5, 1),(10, 'A', '0', 5, 3),(11, 'B', '0', 5, 2);";
      if (mysqli_query($conn, $sql)) {
            echo "Uspesno ste ubacili podatke u tabelu Opcije <br>";
      }else{
            echo 'Gresku pri ubacivanje podataka u tabelu Opcije: ' . mysqli_error($conn) . "<br>";
      }

      mysqli_close($conn);
      echo "Sad cemo vas redirektirati na pocetnu stranu! <br>";
      header('refresh:5;url=index.php');
      die();
    ?>
</body>
</html>