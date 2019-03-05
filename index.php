<?php include "head.php"; ?>
</head>
		<body>

		<?php include "header.php"; ?>

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
							<a href="jadualmesy.php" class="btn btn-primary">Lihat Jadual Mesyuarat</a>
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
										<td><?php echo $row['bilik_nama']; ?></td>
                                        </tr>
                                    <?php } ?>
									</tbody>
								</table>			
						</div>
					</div>	
				</section>
			<!-- End home-aboutus Area -->
		

<?php include "footer.php"; ?>