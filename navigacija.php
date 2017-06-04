<div id="glavni-meni" class="kol-12 text-centered">
  <ul class="glavni-meni">
      <li><a href="index.php"> Naslovna </a></li>
      <li><a href="kategorija.php?kategorija=1"> Ekonomija <i class="fa fa-caret-down"></i></a>
          <ul class="pod-meni">
            <li><a href="kategorija.php?kategorija=1_1">Privreda</a></li>
            <li><a href="kategorija.php?kategorija=1_2">Finansije</a></li>
            <li><a href="kategorija.php?kategorija=1_3">Biznis</a></li>
          </ul>
      </li>
      <li><a href="kategorija.php?kategorija=2"> Politika <i class="fa fa-caret-down"></i></a>
          <ul class="pod-meni">
            <li><a href="kategorija.php?kategorija=2_1">Domaća</a></li>
            <li><a href="kategorija.php?kategorija=2_2">Regionalna</a></li>
            <li><a href="kategorija.php?kategorija=2_3">Svet</a></li>
          </ul>
      </li>
      <li><a href="kategorija.php?kategorija=3"> Tehnologije <i class="fa fa-caret-down"></i></a>
          <ul class="pod-meni">
            <li><a href="kategorija.php?kategorija=3_1">Software</a></li>
            <li><a href="kategorija.php?kategorija=3_2">Komunikacije</a></li>
            <li><a href="kategorija.php?kategorija=3_3">Energetika</a></li>
          </ul>
      </li>
      <li><a href="kategorija.php?kategorija=4"> Sport <i class="fa fa-caret-down"></i></a>
          <ul class="pod-meni">
            <li><a href="kategorija.php?kategorija=4_1">Fudbal</a></li>
            <li><a href="kategorija.php?kategorija=4_2">Košarka</a></li>
            <li><a href="kategorija.php?kategorija=4_3">Tenis</a></li>
            <li><a href="kategorija.php?kategorija=4_4">Atletika</a></li>
          </ul>
      </li>
      <li><a href="kategorija.php?kategorija=5"> Kultura <i class="fa fa-caret-down"></i></a>
          <ul class="pod-meni">
            <li><a href="kategorija.php?kategorija=5_1">Film</a></li>
            <li><a href="kategorija.php?kategorija=5_2">Slikarstvo</a></li>
            <li><a href="kategorija.php?kategorija=5_3">Muzika</a></li>
            <li><a href="kategorija.php?kategorija=5_4">Pozorište</a></li>
          </ul>
      </li>
      <li><a href="kontakt.php"> Kontakt</a></li>
      <?php if(!$user){ ?>
          <li><a href="ulogovanje.php" class="white-button"> Uloguj se </a></li>
      <?php }else{ ?>
          <li><a href="#"> Aktivnosti <i class="fa fa-caret-down"></i></a>
            <ul class="pod-meni">
              <li><a href="unesi_vest.php">Unesi Vest</a></li>
              <li><a href="azuriraj_vesti.php">Ažuriraj Vest</a></li>
              <li><a href="naslovna.php">Izbor Naslovne</a></li>
            </ul>
          </li>
          <li><a href="action_logout.php" class="white-button"> Izloguj te se </a></li>
      <?php } ?>
  </ul>
</div>