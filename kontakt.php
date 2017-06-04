<!DOCTYPE html>
<html lang="rs">
<head>
    <meta charset="UTF-8">
    <title>IP - Projekat</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                               <<?php include('navigacija.php'); ?>
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
                        <h2 class="kategorija-naslov">Kontakt</h2>
                      </div>
                      <div class="kol-12 korisnicka-forma">
                          <div class="kol-6">
                          <p class="color-caption"><i class="fa fa-envelope"></i> email@example.com | <i class="fa fa-phone"></i> +381 68 3332232 </p></p>
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-user input-group-addon"></span>
                                      <input type="text" class="form-control" name="naslov" placeholder="Vaše ime" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-envelope input-group-addon"></span>
                                      <input type="email" class="form-control" name="email" placeholder="Vaša email adresa" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-envelope-open-o input-group-addon"></span>
                                      <input type="text" class="form-control" name="subject" placeholder="Naslov" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <span class="fa fa-comment-o input-group-addon"></span>
                                      <textarea class="form-control" name="poruka" placeholder="Vaša poruka"></textarea>
                                  </div>
                              </div>
                              <a href="#" class="primary-button">Pošalji</a>
                          </div>
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