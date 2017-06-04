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
        $id = $_GET['vest'];


        /* // Trenutni URL
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('/', $url); 
        array_pop($url); 
        $url = implode('/', $url); */

        // Trazimo vest sa zadati ID
        $sql = "SELECT * FROM `vesti` WHERE `IDVesti` = '". $id ."'";
        $vest = mysqli_query($conn, $sql);
        if(mysqli_num_rows($vest)){
          $vest = mysqli_fetch_assoc($vest);
        }else{
          header('Location: index.php'); 
          die();
        }

        // Formatiramo Datum kad je kreiran post
        $datum = date_create($vest['datum']);
        $datum = date_format($datum,"d-m-Y");

        // Trazimo korisnika koji je postirao ovaj post
        $sql = "SELECT * FROM `korisnici` WHERE `IDKorisnika` = '". $vest['IDKorisnika'] ."'";
        $vest_korisnik = mysqli_fetch_assoc(mysqli_query($conn, $sql));

         // Trazimo komentare za dati post
        $sql = "SELECT * FROM `komentari` WHERE `IDVesti` = '". $vest['IDVesti'] ."'";
        $komentari = mysqli_query($conn, $sql);

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
                        <h2 class="kategorija-naslov"><?php echo $vest['Naslov']; ?></h2>
                      </div>
                      <div class="kol-12">
                          <div class="vest">
                              <div class="vest-meta caption-color">
                              <span><?php echo $datum; ?> od <a href="korisnik.php?korisnik=<?php echo $vest_korisnik['IDKorisnika']; ?>" class="primary-color"><?php echo $vest_korisnik['Ime'] .' '. $vest_korisnik['Prezime']; ?></a> | </span> 
                              <a href="#" data-id="<?php echo $vest['IDVesti']; ?>" class="like-button" onclick="verifyLike(this);"><i class="fa fa-thumbs-o-up primary-color"></i> <span class="like-count"><?php echo $vest['BrojLajkova']; ?></span> </a> 
                              <a href="#" data-id="<?php echo $vest['IDVesti']; ?>" class="hate-button" onclick="verifyHate(this);"><i class="fa fa-thumbs-o-down red-color"></i> <span class="hate-count"><?php echo $vest['BrojHejtova']; ?></span> </a>
                              </div>
                              <?php include('vesti/full/vest-'. $vest['IDVesti'] .'.html'); ?>
                          </div>
                      <div class="kol-12 mtop20">
                        <h3 class="kategorija-naslov">Komentari</h3>
                            <div class="comments-list">
                            <?php if(count($komentari)){ ?>
                                <?php foreach($komentari as $komentar){ $korisnik = getCommentUser($conn, $komentar['IDKorisnika']); ?>
                                    <div class="comment">
                                        <div class="user-picture">
                                          <img src="<?php echo $korisnik['Slika']; ?>" />
                                        </div>
                                        <div class="comment-data">
                                          <p class="user-data caption-color"><?php echo $korisnik['Ime'] .' '. $korisnik['Prezime']; ?>
                                          <a href="#" style="padding-left: 10px;" data-id="<?php echo $komentar['IDKomentara']; ?>" class="like-button" onclick="verifyLikeComment(this);"><i class="fa fa-thumbs-o-up primary-color"></i> <span class="like-count"><?php echo $komentar['BrojLajkova']; ?></span> </a> 
                                          <a href="#" data-id="<?php echo $komentar['IDKomentara']; ?>" class="hate-button" onclick="verifyHateComment(this);"><i class="fa fa-thumbs-o-down red-color"></i> <span class="hate-count"><?php echo $komentar['BrojHejtova']; ?></span> </a>
                                          </p>
                                          <p class="comment-content primary-color"><strong><?php echo $komentar['NaslovKomentara']; ?></strong></p>
                                          <p class="comment-content text-color"><?php echo $komentar['TextKomentara']; ?></p>
                                        </div>
                                      </div>
                                <?php } ?>
                                <?php }else{ ?>
                                  <p class="wrong-error text-centered">Nema komentara!</p>
                                <?php } ?>
                            </div>
                      </div>
                      <?php if($user){ ?>
                          <div class="kol-12 mtop20">
                          <form method="post" action="action_post_komentar.php">
                              <div class="form-group">
                                  <div class="input-group">
                                        <span class="fa fa-user input-group-addon"></span>
                                        <input type="text" class="form-control" name="naslov" placeholder="Naslov" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-comment-o input-group-addon"></span>
                                      <textarea class="form-control" name="poruka" placeholder="Komentar"></textarea>
                                  </div>
                              </div>
                              <input type="hidden" name="vest" value="<?php echo $id; ?>" />
                              <input type="hidden" name="korisnik" value="<?php echo $user['IDKorisnika']; ?>" />
                              <button type="submit" class="primary-button">Komentiraj</button>
                            </form>
                          </div>
                      <?php }else{ ?>
                          <p class="wrong-error text-centered">Morate se ulogovati pre nego sto mozete da komentarisete!</p>
                      <?php } ?>
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