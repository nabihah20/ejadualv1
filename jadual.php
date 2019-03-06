
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="css/admin-main.css">

<title>Jadual Basic</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        $(document).ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
          header:{
                    left: 'today,prev,next',
                    center: 'title',
                    right:'month,basicWeek,basicDay,agendaDay'
                }
        });

    });
    </script>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
      </head>
      <body>
      <header id="header" id="home" >
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
				  <div id="logo">
					<a href="index.php"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
				  </div>
				  <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="index.php #home"><span class="glyphicon glyphicon-home">Utama</span></a></li>
                <li><a href="index.php #project">Cara Penggunaan</a></li>
                <li class="menu-has-children"><a href="index.php #senarai">Senarai</a>
                  <ul>
                  <li><a href="senarai.php #senaraibilik">Bilik</a></li>
                  <li><a href="senarai.php #senaraijab">Jabatan</a></li>
                  <li><a href="senarai.php #senaraiagensi">Agensi</a></li>
                  </ul>
                </li>
                <li class="menu-has-children"><a href="#">Jadual</a>
                  <ul>
                    <li><a href="jadualsu.php">Setiausaha Bandaran</a></li>
                    <li><a href="jadualmesy.php">Mesyuarat</a></li>
                  </ul>
                </li>
            </ul>
				  </nav><!-- #nav-menu-container -->		  	
				</div>
			</div>
		  </header><!-- #header -->	
      <section class="generic-banner"  style="background-color: #00bfff;">	

</section>		
<!-- End banner Area -->
  <!-- Start protfolio Area -->
  <section class="protfolio-area section-gap" id="project">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-60 col-lg-10">
        <div class="title text-center">
          <h1 class="mb-10">Jadual Mesyuarat</h1>
        </div>
      </div>
    </div>						
    <div class="row">
      <div class="col"></div>
      <div class="col-7"></div><div id="calendar"></div>
      <div class="col"></div>
    </div>
  </div>	
</section>

			<!-- start footer Area -->		
			<section class="footer" style="background-color: #000; height: 100px">
                <div class="container">
                    <div class="row">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Hakcipta Terpelihara &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://www.mbi.gov.my/" target="_blank">Majlis Bandaraya Ipoh</a> | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="https://www.facebook.com/MajlisBandarayaIpoh/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/mbi_citycouncil" target="_blank"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
				</div>
		</section>
			<!-- End footer Area -->	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	

</body>
</html>