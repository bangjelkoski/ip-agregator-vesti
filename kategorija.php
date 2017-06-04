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

        // Uzimamo ID kategorije
        $id = $_GET['kategorija'];
        $ime = $const_kategorije[$id];

        // Trazimo ukupan broj vesti + Handle za Podkategorije
        $duzina = strlen($id);
        if($duzina > 1){
            // Trazimo vest sa zadati ID Kategorije
            $sql = "SELECT * FROM `vesti` WHERE `PodKategorija` LIKE '%". $id ."%'";
            $vesti = mysqli_query($conn, $sql);
            $broj_vesti = mysqli_num_rows($vesti);
        }else{
            // Trazimo vest sa zadati ID Kategorije
            $sql = "SELECT * FROM `vesti` WHERE `PodKategorija` LIKE '%". $id ."_%'";
            $vesti = mysqli_query($conn, $sql);
            $broj_vesti = mysqli_num_rows($vesti);
        }

        // Formiramo Paginaciju
        $page = isset($_GET['page']) ? $_GET['page'] : 1; 
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 5; 
        $start = ($page == 1) ? 0 : $limit * ($page-1);
        $total = ceil($broj_vesti / $limit);

        // Sortiranje
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 1;
        switch($sort){
          case '1': $order = "ORDER BY `datum` DESC"; break;
          case '3': $order = "ORDER BY `BrojLajkova` DESC"; break;
        }

        // Trazimo vesti za zadate kriterijume
        $duzina = strlen($id);
        if($duzina > 1 && $sort != '2'){
            // Trazimo vest sa zadati ID Kategorije
            $sql = "SELECT * FROM `vesti` WHERE `PodKategorija` LIKE '%". $id ."%' ". $order ." LIMIT ". $start .",". $limit ."";
            $vesti = mysqli_query($conn, $sql);
            $broj_vesti = mysqli_num_rows($vesti);
        }else if($sort != '2'){
            // Trazimo vest sa zadati ID Kategorije
            $sql = "SELECT * FROM `vesti` WHERE `PodKategorija` LIKE '%". $id ."_%' ". $order ." LIMIT ". $start .",". $limit ."";
            $vesti = mysqli_query($conn, $sql);
            $broj_vesti = mysqli_num_rows($vesti);
        }else{
            // Trazimo vest sa zadati ID Kategorije - Sortiranje po broj komentara
            $sql = "SELECT vest.* FROM `vesti` vest LEFT JOIN `komentari` as komentar on vest.IDVesti = komentar.IDVesti WHERE `PodKategorija` LIKE '%". $id ."%' GROUP BY vest.IDVesti ORDER BY COUNT(*) DESC LIMIT ". $start .",". $limit ."";
            $vesti = mysqli_query($conn, $sql);
            $broj_vesti = mysqli_num_rows($vesti);
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
          <div id="main-content">
              <div class="glavni-block glavni-sadrzaj box-shadow">
                  <div class="red">
                      <div class="kol-12">
                        <h2 class="kategorija-naslov"><?php echo $ime; ?></h2>
                      </div>
                      <div class="kol-12 pull-right sort-picker">
                          <form method="get" action="kategorija.php" class="form-sort-picker">
                              <button class="primary-button" type="submit" style="margin-left: 5px; height: 34px;"><i class="fa fa-sort"></i></button> 
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="fa fa-sort input-group-addon"></span>
                                        <select class="form-control" name="sort" value="<?php echo $sort; ?>" placeholder="Sortiranje">
                                            <option <?php if($sort == '1') echo 'selected'; ?> value="1"> Datum Objave </option>
                                            <option <?php if($sort == '2') echo 'selected'; ?> value="2"> Broj komentara </option>
                                            <option <?php if($sort == '3') echo 'selected'; ?> value="3"> Broj Lajkova </option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-right: 5px;">
                                        <input type="number" min="1" class="form-control" value="<?php echo $limit; ?>" name="limit" />
                                  </div>
                              <input type="hidden" name="page" value="1" />
                              <input type="hidden" name="kategorija" value="<?php echo $id; ?>" />
                          </form>
                      </div>
                      <div class="clearfix"></div>
                      <?php if($broj_vesti) { ?>
                        <?php foreach($vesti as $vest){ ?>
                            <div class="kol-4 grid-post">
                              <div class="post">
                                  <h3 class="post-title"><a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>"><?php echo $vest['Naslov'] ?></a></h3>
                                  <div class="post-meta caption-color">Mart 23, 2017 | Admin</div>
                                  <?php include('vesti/long/vest-'. $vest['IDVesti'] .'.html'); ?>
                                  <a href="vest.php?vest=<?php echo $vest['IDVesti']; ?>" class="procitaj-vise">Procitaj više ... </a>
                              </div>
                        <?php } ?>
                      <?php }else{ ?>
                            <p class="wrong-error text-centered">Nema rezultata!</p>
                      <?php } ?>
                  </div>
                  <div class="kol-12">
                    <ul class="pagination pull-right">
                        <?php for($i = 0; $i < $total; $i++){ ?>
                            <li class="<?php echo ($page == $i + 1) ? 'active' : '' ?>"><a href="kategorija.php?kategorija=<?php echo $id; ?>&page=<?php echo $i+1; ?>&limit=<?php echo $limit; ?>&sort=<?php echo $sort; ?>"> <?php echo $i + 1; ?> </a></li>
                        <?php } ?>
                    </ul>
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