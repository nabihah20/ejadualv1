<?php include "header.php"; ?>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="#home"><span class="glyphicon glyphicon-home">Utama</span></a></li>
				          <li><a href="#project">Cara Penggunaan</a></li>
				          <li><a href="#senarai">Senarai</a></li>
				          <li><a href="login.php">Log Masuk</a></li>
				          <li class="menu-has-children"><a href="#">Jadual</a>
				            <ul>
				              <li><a href="jadualsu.html">Setiausaha Bandaran</a></li>
				              <li><a href="jadualmesy.html">Mesyuarat</a></li>
				            </ul>
									</li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-7">
							<h1>
								eJadual			
							</h1>
							<h2>Sistem Penjadualan Mesyuarat</h2>
							<h4>
								Majlis Bandaraya Ipoh	
							</h4>
							<br/>
							<button type="submit" class="btn">Lihat Jadual Mesyuarat</button>
						</div>				
					</div>

				</div>
				
			</section>
			<!-- End banner Area -->	

			<!-- Start protfolio Area -->
			<section class="protfolio-area section-gap" id="project">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Cara Penggunaan</h1>
								<p>Mudah, cepat dan benar</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-3 single-portfolio">
                            <h4>Langkah 1</h4>
                            <hr>
                            <h5>Cari tarikh dan masa untuk melihat mesyuarat yang ada</h5>
                            <img class="image img-fluid" src="img/langkah1.png" alt="">
							<a href="img/langkah1.png" class="img-pop-up">	
								<div class="middle">
									<div class="text"><span class="lnr lnr-frame-expand"></span></div>
								</div>
                            </a>
                        </div>
						<div class="col-lg-3 single-portfolio">
                            <h4>Langkah 2</h4>
                            <hr>
                            <h5>Klik nama mesyuarat untuk melihat maklumat lanjut</h5>
                            <img class="image img-fluid" src="img/langkah1.png" alt="">
							<a href="img/langkah1.png" class="img-pop-up">	
								<div class="middle">
									<div class="text"><span class="lnr lnr-frame-expand"></span></div>
								</div>
                            </a>
                        </div>
						<div class="col-lg-3 single-portfolio">
                            <h4>Langkah 3</h4>
                            <hr>
                            <h5>Klik '+' untuk tambah mesyuarat baru </h5>
							<img class="image img-fluid" src="img/langkah1.png" alt="">
							<a href="img/langkah1.png" class="img-pop-up">	
								<div class="middle">
									<div class="text"><span class="lnr lnr-frame-expand"></span></div>
								</div>
                            </a>
                        </div>
						<div class="col-lg-3 single-portfolio">
                            <h4>Langkah 4</h4>
                            <hr>
                            <h5>Isi maklumat mesyuarat yang akan dijalankan</h5>
							<img class="image img-fluid" src="img/langkah1.png" alt="">
							<a href="img/langkah1.png" class="img-pop-up">	
								<div class="middle">
									<div class="text"><span class="lnr lnr-frame-expand"></span></div>
								</div>
                            </a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End protfolio Area -->			

			<!-- Start home-video Area -->
			<section class="protfolio-area section-gap" id="senarai">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-60 col-lg-10">
								<div class="title text-center">
									<h1 class="mb-10">Senarai Lokasi Mesyuarat</h1>
									<p>Bilik yang dilengkapi sistem siar raya, projektor dan berhawa dingin</p>
								</div>
							</div>
						</div>						
						<div class="row">
								<table class="table table-hover table-dark">
									<thead>
										<tr>
										<th scope="col">#</th>
										<th scope="col">ID</th>
										<th scope="col">Nama</th>
										</tr>
                                    </thead>
									<tbody>
                                    <?php
                                        require_once('connection.php');
                                        $result = $conn->prepare("SELECT * FROM bilik");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++){
                                    ?>
										<tr>
                                        <td><?php echo $row['id'];?></td>
										<td><?php echo $row['bilik_id']; ?></td>
										<td><?php echo $row['nama']; ?></td>
                                        </tr>
                                    <?php } ?>
									</tbody>
								</table>			
						</div>
					</div>	
				</section>
			<!-- End home-aboutus Area -->
		

<?php include "footer.php"; ?>