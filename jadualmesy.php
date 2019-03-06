<?php include "head.php"; ?>
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
            <div class="col-7"></div><div id='calendar'></div>
            <div class="col"></div>
					</div>
				</div>	
			</section>
      <!-- End protfolio Area -->	
      
<?php include "footer.php"; ?>