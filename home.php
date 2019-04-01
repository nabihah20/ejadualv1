<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "headerhome.php"; ?>
<!-- Section: about -->
  <section class="hero" id="intro">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-right navicon">
          <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center inner">
          <div class="animatedParent">
            <h1 style="color: #000">eJadual</h1>
            <h2>Sistem Penjadualan Mesyuarat<br/>Majlis Bandaraya Ipoh	</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <a href="jadualmesy.php" class="learn-more-btn btn-scroll">Lihat Jadual Mesyuarat</a>
        </div>
      </div>
    </div>
  </section>
    <!-- Section: works -->
    <section id="works" class="home-section color-dark text-center bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div>
            <div class="animatedParent">
              <div class="section-heading text-center">
                <h2>Cara Penggunaan</h2>
                <div class="divider-header"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">

      <div class="row animatedParent">
        <div class="col-sm-12 col-md-12 col-lg-12">

          <div class="row gallery-item">
            <div class="col-md-3 animated fadeInUp">
              <p>Langkah 1<br/>
              <hr>
              Cari bulan dan tarikh untuk melihat mesyuarat yang ada</p>
              <a href="img/works/langkah1.png" title="Langkah 1" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/langkah1@2x.png">
								<img src="img/works/langkah1.png" class="img-responsive" alt="img">
							</a>
            </div>
            <div class="col-md-3 animated fadeInUp slow">
              <p>Langkah 2<br/>
              <hr>
              Klik nama mesyuarat untuk melihat maklumat lanjut</p>
              <a href="img/works/langkah2.png" title="Langkah 2" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/langkah2@2x.png">
								<img src="img/works/langkah2.png" class="img-responsive" alt="img">
							</a>
            </div>
            <div class="col-md-3 animated fadeInUp slower">
              <p>Langkah 3<br/>
              <hr>
              Klik ruangan tarikh untuk tambah mesyuarat baru </p>
              <a href="img/works/langkah3.png" title="Langkah 3" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/langkah3@2x.png">
								<img src="img/works/langkah3.png" class="img-responsive" alt="img">
							</a>
            </div>
            <div class="col-md-3 animated fadeInUp">
              <p>Langkah 4<br/>
              <hr>
              Isi maklumat mesyuarat yang akan dijalankan</p>
              <a href="img/works/langkah4.png" title="Langkah 4" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/langkah4@2x.png">
								<img src="img/works/langkah4.png" class="img-responsive" alt="img">
							</a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <ul class="footer-menu">
          
          </ul>
        </div>
        <div class="col-md-8 text-right copyright">

          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bocor
            -->
            Hakcipta Terpelihara &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://www.mbi.gov.my/" target="_blank">Majlis Bandaraya Ipoh</a> 
            | Direka oleh <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a><br/>
            <?php
            $hits = intval(file_get_contents('counter.txt'));
            file_put_contents('counter.txt',$hits+1);
            echo" Laman ini telah dilawati sebanyak ". $hits  . " kali sejak 13 Mac 2019 " ;
            ?>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/css3-animate-it.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
