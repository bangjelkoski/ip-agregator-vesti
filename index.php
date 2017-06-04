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

        // Uzimamo Vesti
        $a = getVesti($conn, 'A'); 
        $b = getVesti($conn, 'B');
        $d = getVesti($conn, 'D');
        $l = getVesti($conn, 'L');
        $e = getVesti($conn, 'E');
        $g = getVesti($conn, 'G');
        $f = getVesti($conn, 'F');
        $h = getVesti($conn, 'H');
        $i = getVesti($conn, 'I');
        $j = getVesti($conn, 'J');
        $k = getVesti($conn, 'K');

        // Uzimamo Opcije za Blokove
        $d_setting = getSetting($conn, 'D');
        $l_setting = getSetting($conn, 'L');
        $e_setting = getSetting($conn, 'E');
        $g_setting = getSetting($conn, 'G');
        $f_setting = getSetting($conn, 'F');
        $h_setting = getSetting($conn, 'H');
        $i_setting = getSetting($conn, 'I');
        $j_setting = getSetting($conn, 'J');
        $k_setting = getSetting($conn, 'K');
    ?>
</head>
<body class="pocetna">
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
               <!-- Pocetak Head Blokovi -->
               <div id="head-blokovi" class="glavni-block-full">
                   <div class="glavni-block">
                      <div class="red">
                           <div class="kol-6">
                              <div class="head-blok">
                                <?php foreach($a as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                                    <div class="post">
                                        <h3 class="post-title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>" style="color: white;"><?php echo substr($vest['Naslov'], 0, 32) ?> ... </a></h3>
                                        <div class="post-meta caption-color"><?php echo $datum; ?></div>
                                        <?php include('vesti/top/vest-'. $vest['IDVesti'] .'.html'); ?>
                                    </div>
                                <?php } ?>
                              </div>
                           </div>
                           <div class="kol-6">
                              <div class="head-blok">
                                  <?php foreach($b as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                                    <div class="post">
                                        <h3 class="post-title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>" style="color: white;"><?php echo substr($vest['Naslov'], 0, 32) ?> ... </a></h3>
                                        <div class="post-meta caption-color"><?php echo $datum; ?></div>
                                        <?php include('vesti/top/vest-'. $vest['IDVesti'] .'.html'); ?>
                                    </div>
                                <?php } ?>
                              </div>
                           </div>
                      </div>
                   </div>
               </div>
               <!-- Kraj Head Blokovi -->
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
              <div class="glavni-block">
                  <div class="red">
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $l_setting['Kategorija'] ?>"><?php echo $const_kategorije[$l_setting['Kategorija']] ?></a></h3>
                            <?php if(count($l)){ ?>
                            <?php foreach($l as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $d_setting['Kategorija'] ?>"><?php echo $const_kategorije[$d_setting['Kategorija']] ?></a></h3>
                            <?php if(count($d)){ ?>
                            <?php foreach($d as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $e_setting['Kategorija'] ?>"><?php echo $const_kategorije[$e_setting['Kategorija']] ?></a></h3>
                            <?php if(count($e)){ ?>
                            <?php foreach($e as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $f_setting['Kategorija'] ?>"><?php echo $const_kategorije[$f_setting['Kategorija']] ?></a></h3>
                            <?php if(count($f)){ ?>
                            <?php foreach($f as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>  
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $g_setting['Kategorija'] ?>"><?php echo $const_kategorije[$g_setting['Kategorija']] ?></a></h3>
                            <?php if(count($g)){ ?>
                            <?php foreach($g as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $h_setting['Kategorija'] ?>"><?php echo $const_kategorije[$h_setting['Kategorija']] ?></a></h3>
                            <?php if(count($h)){ ?>
                            <?php foreach($h as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $i_setting['Kategorija'] ?>"><?php echo $const_kategorije[$i_setting['Kategorija']] ?></a></h3>
                            <?php if(count($i)){ ?>
                            <?php foreach($i as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $j_setting['Kategorija'] ?>"><?php echo $const_kategorije[$j_setting['Kategorija']] ?></a></h3>
                            <?php if(count($j)){ ?>
                            <?php foreach($j as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
                          </div>
                      </div>
                      <div class="kol-4">
                          <div class="kategorija-blok box-shadow">
                              <h3 class="kategorija-naslov"><a href="kategorija.php?kategorija=<?php echo $k_setting['Kategorija'] ?>"><?php echo $const_kategorije[$k_setting['Kategorija']] ?></a></h3>
                            <?php if(count($k)){ ?>
                            <?php foreach($k as $vest){ $datum = date_create($vest['datum']); $datum = date_format($datum,"d-m-Y");  ?>
                              <div class="small-post">
                                  <?php include('vesti/short/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <div class="data">
                                      <div class="title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo substr($vest['Naslov'], 0, 32).' ...'; ?></a></div>
                                      <div class="meta">
                                          <i class="fa fa-calendar"></i> Datum Objave: <?php echo $datum; ?>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>   
                            <?php }else{ ?>
                                <p class="wrong-error text-centered">Nema rezultata!</p>
                            <?php } ?>                               
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