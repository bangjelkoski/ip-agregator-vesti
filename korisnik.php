<!DOCTYPE html>
<html lang="rs">
<head>
    <meta charset="UTF-8">
    <title>IP - Projekat</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php
        // Ukljucujemo glavni konfiguracioni fajl
        include('config.php');

        // Uzimamo ID 
        $id = $_GET['korisnik'];

        // Trazimo vest sa zadati ID
        $sql = "SELECT * FROM `korisnici` WHERE `IDKorisnika` = '". $id ."'";
        $korisnik = mysqli_query($conn, $sql);
        if(mysqli_num_rows($korisnik)){
          $korisnik = mysqli_fetch_assoc($korisnik);
          unset($korisnik['Šifra']);
        }else{
          header('Location: index.php'); 
          die();
        }
    ?>
</head>
<body class="post-id-0">
   <div class="wrapper">
      <!-- Pocetak Header -->
         <div id="header"> 
              <!-- Pocetak Top -->
              <div id="top" class="glavni-block-full">
                   <div class="glavni-block">
                      <div class="red">
                           <div class="kol-6">
                               <p class="top-text text-left primary-color"> Dobrodošli na naš sajt.</p>
                           </div>
                           <div class="kol-6">
                              <p class="top-text text-right primary-color"><i class="fa fa-envelope"></i> email@example.com | <i class="fa fa-phone"></i> +381 68 3332232 </p>
                           </div>
                      </div>
                   </div>
               </div>
               <!-- Kraj Top -->
               <!-- Pocetak Navigacija -->
               <div id="navigacija" class="glavni-block-full box-shadow">
                   <div class="glavni-block">
                        <div class="red">
                               <?php include('navigacija.php'); ?>
                          </div>
                    </div>
               </div>
               <!-- Kraj Navigacija -->
          </div>
      <!-- Kraj Header -->
      <!-- Pocetak Main Content -->
          <div id="main-content">
              <div class="glavni-block glavni-sadrzaj box-shadow">
                  <div class="red">
                      <div class="kol-12">
                        <h2 class="kategorija-naslov">Korisnik - <?php echo $korisnik['Ime']; ?></h2>
                      </div>
                      <div class="kol-12">
                      <img src="<?php echo $korisnik['Slika']; ?>" />
                          <ul>
                            <li> Ime: <strong> <?php echo $korisnik['Ime']; ?> </strong></li>
                            <li> Prezime: <strong> <?php echo $korisnik['Prezime']; ?> </strong></li>
                            <li> Telefon: <strong> <?php echo $korisnik['Mobilni']; ?> </strong></li>
                            <li> Email: <strong> <?php echo $korisnik['Email']; ?> </strong></li>
                            <li> Adresa: <strong> <?php echo $korisnik['Adresa']; ?> </strong></li>
                            <li> Komentar: <strong> <?php echo $korisnik['Komentar']; ?> </strong></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      <!-- Kraj Main Content -->
   </div>
   <div class="footer glavni-block-full">
       <div class="copyright">Copyright &copy; 2017 - Andjelkoski Bojan, Askovic Lazar</div>
   </div>

   <!-- Javascripts -->
  <script src="assets/js/main.js"></script>
</body>
</html>