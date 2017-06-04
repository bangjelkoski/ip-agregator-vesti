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

      // Uzimamo konfiguracije sa databaze
      $a = getSetting($conn, 'A');
      $b = getSetting($conn, 'B');
      $d = getSetting($conn, 'D');
      $l = getSetting($conn, 'L');
      $e = getSetting($conn, 'E');
      $g = getSetting($conn, 'G');
      $f = getSetting($conn, 'F');
      $h = getSetting($conn, 'H');
      $i = getSetting($conn, 'I');
      $j = getSetting($conn, 'J');
      $k = getSetting($conn, 'K');
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
                    <?php if($user['IDKorisnika'] == 1){ ?>
                    <form method="post" action="action_naslovna.php">
                    <div class="kol-6">
                      <h2 class="kategorija-naslov">Broj Vesti - A</h2>
                      <div class="input-group">
                          <span class="fa fa-plus-square-o input-group-addon"></span>
                          <input type="number" min="1" name="a_number" value="<?php echo $a['Broj']; ?>" class="form-control" required placeholder="Broj Vesti - A" />
                      </div>
                    </div>
                    <div class="kol-6">
                      <h2 class="kategorija-naslov">Broj Vesti - B</h2>
                      <div class="input-group">
                          <span class="fa fa-plus-square-o input-group-addon"></span>
                          <input type="number" min="1" name="b_number" value="<?php echo $b['Broj']; ?>" class="form-control" required placeholder="Broj Vesti - A" />
                      </div>
                    </div>
                      <div class="kol-4 mtop20">
                      <h2 class="kategorija-naslov">Blok D</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" data-val="<?php echo $d['Kategorija']; ?>" value="<?php echo $d['Kategorija']; ?>" name="d_category" onchange=" verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($d['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($d['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($d['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($d['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($d['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($d['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($d['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($d['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($d['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($d['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($d['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($d['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($d['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($d['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($d['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($d['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($d['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($d['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($d['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($d['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($d['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($d['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="d_sort" value="<?php echo $d['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($d['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($d['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($d['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="d_number" value="<?php echo $d['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok E</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $e['Kategorija']; ?>" name="e_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($e['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($e['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($e['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($e['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($e['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($e['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($e['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($e['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($e['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($e['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($e['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($e['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($e['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($e['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($e['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($e['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($e['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($e['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($e['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($e['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($e['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($e['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="e_sort" value="<?php echo $e['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($e['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($e['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($e['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="e_number" value="<?php echo $e['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok F</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $f['Kategorija']; ?>" name="f_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($f['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($f['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($f['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($f['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($f['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($f['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($f['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($f['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($f['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($f['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($f['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($f['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($f['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($f['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($f['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($f['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($f['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($f['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($f['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($f['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($f['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($f['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="f_sort" value="<?php echo $f['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($f['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($f['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($f['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="f_number" value="<?php echo $f['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok G</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $g['Kategorija']; ?>" name="g_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($g['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($g['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($g['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($g['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($g['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($g['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($g['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($g['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($g['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($g['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($g['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($g['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($g['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($g['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($g['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($g['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($g['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($g['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($g['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($g['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($g['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($g['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="g_sort" value="<?php echo $g['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($g['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($g['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($g['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="g_number" value="<?php echo $d['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok H</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $h['Kategorija']; ?>" name="h_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($h['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($h['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($h['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($h['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($h['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($h['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($h['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($h['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($h['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($h['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($h['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($h['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($h['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($h['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($h['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($h['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($h['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($h['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($h['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($h['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($h['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($h['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="h_sort" value="<?php echo $h['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($h['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($h['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($h['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="h_number" value="<?php echo $h['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok I</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $i['Kategorija']; ?>" name="i_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($i['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($i['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($i['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($i['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($i['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($i['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($i['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($i['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($i['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($i['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($i['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($i['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($i['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($i['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($i['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($i['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($i['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($i['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($i['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($i['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($i['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($i['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="i_sort" value="<?php echo $i['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($i['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($i['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($i['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="i_number" value="<?php echo $i['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok J</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $j['Kategorija']; ?>" name="j_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($j['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($j['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($j['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($j['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($j['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($j['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($j['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($j['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($j['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($j['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($j['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($j['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($j['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($j['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($j['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($j['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($j['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($j['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($j['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($j['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($j['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($j['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="j_sort" value="<?php echo $j['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($j['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($j['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($j['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="j_number" value="<?php echo $j['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok K</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $k['Kategorija']; ?>" name="k_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($k['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($k['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($k['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($k['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($k['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($k['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($k['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($k['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($k['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($k['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($k['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($k['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($k['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($k['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($k['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($k['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($k['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($k['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($k['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($k['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($k['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($k['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="k_sort" value="<?php echo $k['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($k['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($k['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($k['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="k_number" value="<?php echo $k['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-4">
                      <h2 class="kategorija-naslov">Blok L</h2>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control kategorija-za-naslovnu" value="<?php echo $l['Kategorija']; ?>" name="l_category" onchange="verifyCategoryForHome(this);" required placeholder="Izaberi Kategoriju">
                                    <option <?php if($l['Kategorija'] == '1') echo 'selected'; ?> value="1"> Ekonomija </option>
                                    <option <?php if($l['Kategorija'] == '1_1') echo 'selected'; ?> value="1_1"> Ekonomija - Privreda </option>
                                    <option <?php if($l['Kategorija'] == '1_2') echo 'selected'; ?> value="1_2"> Ekonomija - Finansije</option>
                                    <option <?php if($l['Kategorija'] == '1_3') echo 'selected'; ?> value="1_3"> Ekonomija - Biznis</option>
                                    <option <?php if($l['Kategorija'] == '2') echo 'selected'; ?> value="2"> Politika </option>
                                    <option <?php if($l['Kategorija'] == '2_1') echo 'selected'; ?> value="2_1"> Politika - Domaća </option>
                                    <option <?php if($l['Kategorija'] == '2_2') echo 'selected'; ?> value="2_2"> Politika - Regionalna</option>
                                    <option <?php if($l['Kategorija'] == '2_3') echo 'selected'; ?> value="2_3"> Politika - Svet</option>
                                    <option <?php if($l['Kategorija'] == '3') echo 'selected'; ?> value="3"> Tehnologije </option>
                                    <option <?php if($l['Kategorija'] == '3_1') echo 'selected'; ?> value="3_1"> Tehnologije - Software </option>
                                    <option <?php if($l['Kategorija'] == '3_2') echo 'selected'; ?> value="3_2"> Tehnologije - Komunikacije</option>
                                    <option <?php if($l['Kategorija'] == '3_3') echo 'selected'; ?> value="3_3"> Tehnologije - Energetika</option>
                                    <option <?php if($l['Kategorija'] == '4') echo 'selected'; ?> value="4"> Sport </option>
                                    <option <?php if($l['Kategorija'] == '4_1') echo 'selected'; ?> value="4_1"> Sport - Fudbal </option>
                                    <option <?php if($l['Kategorija'] == '4_2') echo 'selected'; ?> value="4_2"> Sport - Košarka</option>
                                    <option <?php if($l['Kategorija'] == '4_3') echo 'selected'; ?> value="4_3"> Sport - Tenis</option>
                                    <option <?php if($l['Kategorija'] == '4_4') echo 'selected'; ?> value="4_4"> Sport - Atletika</option>
                                    <option <?php if($l['Kategorija'] == '5') echo 'selected'; ?> value="5"> Kultura </option>
                                    <option <?php if($l['Kategorija'] == '5_1') echo 'selected'; ?> value="5_1"> Kultura - Film </option>
                                    <option <?php if($l['Kategorija'] == '5_2') echo 'selected'; ?> value="5_2"> Kultura - Slikarstvo</option>
                                    <option <?php if($l['Kategorija'] == '5_3') echo 'selected'; ?> value="5_3"> Kultura - Muzka</option>
                                    <option <?php if($l['Kategorija'] == '5_4') echo 'selected'; ?> value="5_4"> Kultura - Pozorište</option>
                                </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <div class="input-group">
                                <span class="fa fa-folder input-group-addon"></span>
                                <select class="form-control" name="l_sort" value="<?php echo $l['Sortiranje']; ?>" required placeholder="Izaberi sortiranje">
                                    <option <?php if($l['Sortiranje'] == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                    <option <?php if($l['Sortiranje'] == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                    <option <?php if($l['Sortiranje'] == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="input-group">
                                <span class="fa fa-plus-square-o input-group-addon"></span>
                                <input type="number" min="1" name="l_number" value="<?php echo $l['Broj']; ?>" class="form-control" required placeholder="Broj Vesti" />
                            </div>
                          </div>
                      </div>
                      <div class="kol-12 text-centered">
                              <button type="submit" class="text-centered primary-button">Ažuriraj</button>
                      </div>
                    </form>
                  <?php }else{ ?>
                      <p class="wrong-error text-centered">Niste administrator da bi menjali naslovnu!!</p>
                  <?php } ?>
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