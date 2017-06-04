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
                        <h2 class="kategorija-naslov">Registracija</h2>
                      </div>
                      <div class="kol-12 korisnicka-forma">
                      <?php if(isset($_SESSION['error_register']) && $_SESSION['error_register']) {?>
                      <p class="wrong-error">Molimo vas da proverite formu za registraciju!</p>
                      <?php $_SESSION['error_register'] = false; } if(!$user) { ?>
                        <form method="post" action="action_register.php" id="register-form"  enctype="multipart/form-data"> 
                            <div class="kol-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-user input-group-addon"></span>
                                        <input type="text" class="form-control" required name="first_name" placeholder="Vaše Ime *" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-user input-group-addon"></span>
                                        <input type="text" class="form-control" required name="last_name" placeholder="Vaše Prezime *" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-envelope input-group-addon"></span>
                                        <input type="email" class="form-control email-field" required name="email" placeholder="Vaš email *" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-key input-group-addon"></span>
                                        <input type="password" class="form-control password-field" required name="password" placeholder="Vaša lozinka *" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-phone input-group-addon"></span>
                                        <input type="text" class="form-control phone-field" required name="phone" placeholder="Vaš Telefon *" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-globe input-group-addon"></span>
                                        <input type="text" class="form-control" name="address" placeholder="Vaša Adresa *" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-comment-o input-group-addon"></span>
                                        <textarea class="form-control" name="comment" placeholder="Vaš Komentar *" /></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="primary-button">
                                    Prikaci sliku <input type="file" hidden name="photo">
                                  </label>
                                </div>        
                                <a href="#" class="primary-button register-button" onclick="verifyRegister(this)">Registruj se</a>
                                <a href="ulogovanje.html" class="caption-color small-text">Već ste korisnik? Ulogujte se!</a>
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

     <!-- Javascripts -->
  <script src="assets/js/main.js"></script>
</body>
</html>