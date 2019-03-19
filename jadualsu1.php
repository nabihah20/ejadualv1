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
			<!-- Full Calendar -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>	
			<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>	
			<script src="./js/locale-all.js"></script>
			<script src="./js/ms-my.js"></script>
			<script src="./js/bootstrap-clockpicker.js"></script>
			<link rel="stylesheet" href="./css/bootstrap-clockpicker.css">
			<style>
				.fc th{
					padding: 10px 0px;
					vertical-align: middle;
					background: #f2f2f2; 
				}
			</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<!-- Section: about -->
<section class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Jadual S/U Bandaran</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container">
			<div class="row">
							<div class="col"></div>
							<div class="col-7"></div><div id='calendar'></div>
							<div class="col"></div>				
			</div>
		</div>
  </section>
  <!-- /Section: about -->

			<!-- Modal -->
			<div class="modal fade" id="modalMesy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tajukmesy"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
						<label>Tarikh:</label>
						<input type="text" id="txtTarikh" name="txtTarikh" readonly><br/>

					
							<div class="form-group">
								<label>Nama Mesyuarat:</label>
								<input type="text" id="txtmesy_nama" name="txtmesy_nama" class="form-control" placeholder="Nama Mesyuarat" readonly>
							</div>
							<div class="form-group">
								<label>Masa:</label>
								<div class="input-group clockpicker" data-autoclose="true">
								<input type="text" id="txtMasa" name="txtMasa" value="10:30" class="form-control" placeholder="Masa" readonly>
								</div>
							</div>
				
						<div class="form-group">
							<label>Huraian:</label>
							<textarea id="txtHuraian" class="form-control" placeholder="Huraian" readonly></textarea>
						</div>
						<div class="form-group">
							<label>Color:</label>
							<input type="color" id="txtColor" value="#ff0000" class="form-control" style="height:36px;" readonly>
						</div>
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!--<div class="modal fade" id="modalMesy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width:850px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tajukmesy"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="form-row">
					<div class="form-group col-md-14">
						<label>Tarikh:</label>
						<input type="text" id="txtTarikh" class="form-control" name="txtTarikh" readonly><br/>
					</div>
					<div class="form-group col-md-4">
						<label>Warna:</label>
						<input type="color" id="txtColor" value="#ff0000" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>Status:</label>
						<input type="text" id="txtStatus" value="proses" class="form-control" readonly>
					</div>
					<div class="form-group col-md-12">
						<label>Nama Mesyuarat:</label>
						<input type="text" id="txtmesy_nama" name="txtmesy_nama" class="form-control" placeholder="Nama Mesyuarat">
					</div>
					<div class="form-group col-md-12">
						<label>Huraian:</label>
						<textarea id="txtHuraian" rows="1" class="form-control" placeholder="Huraian"></textarea>
					</div>
					<div class="form-group col-md-7">
							<?php
								//require_once('connection.php');
								//$result = $conn->prepare("SELECT bilik_nama FROM bilik");
								//$result->execute();
								//$bilik = $result->fetchAll();
							?>
						<label>Lokasi:</label>
						<select id="txtlokasi" name="txtlokasi" class="form-control">
							<option>--- Pilih Bilik ---</option>
							<?php //foreach ($bilik as $output){ ?>
							<option><?php //echo $output["bilik_nama"]; ?></option>
							<?php //} ?>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label>Masa:</label>
						<div class="input-group clockpicker" data-autoclose="true">
							<input type="text" id="txtMasa" name="txtMasa" class="form-control" placeholder="Masa">
						</div>
					</div>
					<div class="form-group col-md-12">
							<?php
								//require_once('connection.php');
								//$result = $conn->prepare("SELECT jab_nama FROM jab");
								//$result->execute();
								//$jab = $result->fetchAll();
							?>
						<label>Urusetia:</label>
						<select id="txtlokasi" name="txtlokasi" class="form-control">
							<option></option>
							<?php //foreach ($jab as $output){ ?>
							<option><?php //echo $output["jab_nama"]; ?></option>
							<?php //} ?>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>Pengerusi:</label>
						<input type="text" id="txtpengerusi" name="txtpengerusi" class="form-control" placeholder="Pengerusi">
					</div>
					<div class="form-group col-md-6">
						<label>Ahli Mesyuarat:</label>
						<input type="text" id="txtmesy_ahli" name="txtmesy_ahli" class="form-control" placeholder="Nama Ahli Mesyuarat">
					</div>
					<div class="form-group col-md-6">
							<?php
								//require_once('connection.php');
								//$result = $conn->prepare("SELECT agensi_nama FROM agensi");
								//$result->execute();
								//$agensi = $result->fetchAll();
							?>
						<label>Agensi:</label>
						<select id="txtagensi" name="txtagensi" class="form-control">
							<option>--- Pilih Agensi ---</option>
							<?php //foreach ($agensi as $output){ ?>
							<option><?php //echo $output["agensi_nama"]; ?></option>
							<?php //} ?>
						</select>
					</div>
				</div>
      <div class="modal-footer">
				<button type="button" id="btnTambah" class="btn btn-success" >Tambah</button>
				<button type="button" id="btnUbah"class="btn btn-success" >Ubah</button>
        <button type="button" id="btnPadam" class="btn btn-danger" >Padam</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>-->

      <!-- End Modal -->
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
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php #intro">Home</a></li>
                    <li><a href="index.php #works">Cara Penggunaan</a></li>
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
			<?php include "./footer.php"; ?>
</body>
</html>

			
