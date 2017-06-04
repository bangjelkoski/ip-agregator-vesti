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
                        <h2 class="kategorija-naslov">Ulogovanje</h2>
                      </div>
                      <div class="kol-12 korisnicka-forma">
                      <?php if(isset($_SESSION['register_success']) && $_SESSION['register_success']){ ?>
                          <p class="field-info">Uspešno ste se registrovali! Sad se možete ulogovati!</p>
                      <?php } unset($_SESSION['register_success']); ?>
                      <?php if(isset($_SESSION['error_login']) && $_SESSION['error_login']) {?>
                      <p class="wrong-error">Uneli ste pogresne podatke!</p>
                      <?php $_SESSION['error_login'] = false; } if(!$user) { ?>
                      <form method="post" action="action_login.php">
                          <div class="kol-6">
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-envelope input-group-addon"></span>
                                      <input type="email" class="form-control" required name="email" placeholder="Vaš email *" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-key input-group-addon"></span>
                                      <input type="password" class="form-control" required name="password" placeholder="Vaša lozinka *" />
                                  </div>
                              </div>
                              <button type="submit" class="primary-button">Uloguj se</button>
                              <a href="registracija.php" class="caption-color small-text">Niste korisnik? Registrujte se!</a>
                          </div>
                        </form>
                        <?php }else{ ?>
                            <p class="field-info">Već ste se ulogovali!</p>
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
</body>
</html>