<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <title>eJadual - Sistem Penjadualan Mesyuarat </title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/animations.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Bocor
    Theme URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation" style="padding: 1px 0px;">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="index.php" class="brand"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
            </div>
          </div>


          <div class="col-md-10">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right" style="background: rgba(255, 255, 255, 0);">
                <li class="active"><a href="index.php#intro">Home</a></li>
                <li><a href="index.php#works">Cara Penggunaan</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carian Mesyuarat <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="search.php">Carian Mengikut Kata Kunci</a></li>
                        <li><a href="detailsearch.php">Carian Terperinci</a></li>
                    </ul>
                </li>
                <li><a href="senarai.php">Senarai</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jadual <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="jadualsu.php">Setiausaha Bandaran</a></li>
                        <li><a href="jadualmesy.php">Mesyuarat</a></li>
                    </ul>
                </li>
              </ul>
            </div>
            <!-- /.Navbar-collapse -->

          </div>
        </div>
      </div>
      <!-- /.container -->
    </nav>
  </div>
  <!-- /Navigation -->
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
  <!-- /Section: works -->

  <!-- Section: contact -->
  <!--<section id="contact" class="home-section nopadd-bot color-dark bg-gray text-center">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold animated bounceInDown">Get in touch with us</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">

      <div class="row marginbot-80">
        <div class="col-md-8 col-md-offset-2">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form id="contact-form" action="" method="post" role="form" class="contactForm">
            <div class="row marginbot-20">
              <div class="col-md-6 xs-marginbot-20">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
    									Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>


    </div>
  </section>-->
  <!-- /Section: contact -->


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
