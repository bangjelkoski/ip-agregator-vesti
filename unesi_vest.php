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
        if(!$user){
            header('Location: index.php'); 
            die();
        }

     ?>
</head>
<body>
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
          <div id="main-content"">
              <div class="glavni-block glavni-sadrzaj box-shadow">
                  <div class="red">
                      <div class="kol-12">
                        <h2 class="kategorija-naslov">Unesi Vest</h2>
                      </div>
                      <form method="post" action="action_post_vest.php"  enctype="multipart/form-data">
                        <div class="kol-12 korisnicka-forma">
                            <div class="kol-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-envelope input-group-addon"></span>
                                        <input type="text" class="form-control" required name="naslov" placeholder="Naslov" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-folder input-group-addon"></span>
                                        <select class="form-control" name="kategorija[]" required multiple placeholder="Izaberi Kategoriju">
                                            <option value="1"> Ekonomija </option>
                                            <option value="1_1">Ekonomija - Privreda</option>
                                            <option value="1_2">Ekonomija - Finansije</option>
                                            <option value="1_3">Ekonomija - Biznis</option>
                                            <option value="2"> Politika </option>
                                            <option value="2_1">Politika - Domaća</option>
                                            <option value="2_2">Politika - Regionalna</option>
                                            <option value="2_3">Politika - Svet</option>
                                            <option value="3"> Tehnologija </option>
                                            <option value="3_1">Tehnologija - Software</option>
                                            <option value="3_2">Tehnologija - Komunikacije</option>
                                            <option value="3_3">Tehnologija - Energetika</option>
                                            <option value="4"> Sport </option>
                                            <option value="4_1">Sport - Fudbal</option>
                                            <option value="4_2">Sport - Košarka</option>
                                            <option value="4_3">Sport - Tenis</option>
                                            <option value="4_4">Sport - Atletika</option>
                                            <option value="5"> Kultura </option>
                                            <option value="5_1">Kultura - Film</option>
                                            <option value="5_2">Kultura - Slikarstvo</option>
                                            <option value="5_3">Kultura - Tenis</option>
                                            <option value="5_4">Kultura - Pozorište</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-comment-o input-group-addon"></span>
                                        <textarea class="form-control" required name="sadrzaj" placeholder="Sadrzaj"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="primary-button">
                                    Prikaci sliku <input type="file" hidden name="photo">
                                  </label>
                                </div>        
                                <input type="hidden" name="IDKorisnika" value="<?php echo $user['IDKorisnika']; ?>"/>
                                <button type="submit" name="action" class="primary-button">Unesi</a>
                            </div>
                        </div>  
                      </form>
                   </div>
              </div>
          </div>
      <!-- Kraj Main Content -->
   </div>
   <div class="footer glavni-block-full">
       <div class="copyright">Copyright &copy; 2017 - Andjelkoski Bojan, Askovic Lazar</div>
   </div>
</body>
</html>