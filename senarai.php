<?php include "head.php"; ?>
		<body>

		<?php include "header.php"; ?>

			<!-- start banner Area -->
			<section class="generic-banner"  style="background-color: #00bfff;">	

			</section>	
			<!-- End banner Area -->	

			<!-- Start home-video Area -->
			<section class="protfolio-area section-gap" id="senaraibilik">
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
					<!-- Start home-video Area -->
					<section class="protfolio-area section-gap" id="senaraijab">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-60 col-lg-10">
								<div class="title text-center">
									<h1 class="mb-10">Senarai Jabatan</h1>
									<p>Jabatan-jabatan di Majlis Bandaraya Ipoh</p>
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
                                        $result = $conn->prepare("SELECT * FROM jab");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++){
                                    ?>
										<tr>
                                        <td><?php echo $row['id'];?></td>
										<td><?php echo $row['jab_id']; ?></td>
										<td><?php echo $row['jab_nama']; ?></td>
                                        </tr>
                                    <?php } ?>
									</tbody>
								</table>			
						</div>
					</div>	
				</section>
			<!-- End home-aboutus Area -->
			<!-- Start home-video Area -->
			<section class="protfolio-area section-gap" id="senaraiagensi">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-60 col-lg-10">
								<div class="title text-center">
									<h1 class="mb-10">Senarai Agensi</h1>
									<p>Agensi-agensi kerajaan di Perak Darul Ridzuan</p>
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
                                        $result = $conn->prepare("SELECT * FROM agensi");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++){
                                    ?>
										<tr>
                                        <td><?php echo $row['id'];?></td>
										<td><?php echo $row['agensi_id']; ?></td>
										<td><?php echo $row['agensi_nama']; ?></td>
                                        </tr>
                                    <?php } ?>
									</tbody>
								</table>			
						</div>
					</div>	
				</section>
			<!-- End home-aboutus Area -->
<?php include "footer.php"; ?>