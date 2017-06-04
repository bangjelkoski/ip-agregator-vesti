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

        // Trazimo vesti od trenutnog korisnika
        if($user){
          if($user['IDKorisnika'] == 1){
              $sql = "SELECT * FROM `vesti`";
          }else{
              $sql = "SELECT * FROM `vesti` WHERE `IDKorisnika` = '". $user['IDKorisnika'] ."'";
          }
          $results = mysqli_query($conn, $sql);
        }else{
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
                        <h2 class="kategorija-naslov">Vesti</h2>
                      </div>
                      <div class="kol-12">
                      <?php if(mysqli_num_rows($results)){ ?>
                      <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Naslov</th>
                                  <th>Broj Lajkova</th>
                                  <th>Broj Hejtova</th>
                                  <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($results as $result) { ?>
                                    <tr>
                                      <td><?php echo $result['IDVesti']; ?></td>
                                      <td><?php echo $result['Naslov']; ?></td>
                                      <td><?php echo $result['BrojLajkova']; ?></td>
                                      <td><?php echo $result['BrojHejtova']; ?></td>
                                      <td>
                                      <a href="vest.php?vest=<?php echo $result['IDVesti']; ?>" class="primary-color padding-left-5 "><i class="fa fa-eye"></i></a>
                                      <a href="azuriraj_vest.php?vest=<?php echo $result['IDVesti']; ?>" class="primary-color padding-left-5 "><i class="fa fa-pencil"></i></a>
                                      <a href="action_obrisi_vest.php?vest=<?php echo $result['IDVesti']; ?>" onclick="return confirm('Da li ste sigurni da zelite da obrisete ovu vest?')" class="padding-left-5 red-color"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                      </div>
                      <?php }else{ ?>
                        <p class="wrong-error text-centered">Nema rezultata!</p>
                      <?php } ?>
                      </div>
                  </div>
              </div>
          </div>
      <!-- Kraj Main Content -->
   </div>
   <div class="footer glavni-block-full">
       <div class="copyright">Copyright &copy; 2017 - Andjelkoski Bojan, Askovic Lazar</div>
   </div>
   <script>

   </script>
</body>
</html>