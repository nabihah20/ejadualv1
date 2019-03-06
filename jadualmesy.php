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
				<!--<form>
					<div class="form-group">
							<label>Tarikh:</label>
							<input type="text" id="txtTarikh" name="txtTarikh">
					</div>
					<div class="form-group">
						<label>Nama Mesyuarat:</label>
						<input type="text" id="txtmesy_nama" name="txtmesy_nama" placeholder="Nama">
					</div>
					<div class="form-group">
						<label>Masa:</label>
						<input type="text" id="txtMasa" name="txtMasa" value="10:30" placeholder="Masa">
					</div>
					<div class="form-group">
						<label>Huraian:</label>
						<textarea id="txtHuraian" row="3" placeholder="Huraian"></textarea>
					</div>
					<div class="form-group">
						<label>Color:</label>
						<input type="color" id="txtColor" value="#ff0000">
					</div>
				</form>
				<form>-->
						<label>ID:</label>
						<input type="text" id="txtID" name="txtID"><br/>

						<label>Tarikh:</label>
						<input type="text" id="txtTarikh" name="txtTarikh"><br/>

						<label>Nama Mesyuarat:</label>
						<input type="text" id="txtmesy_nama" name="txtmesy_nama" placeholder="Nama"><br/>

						<label>Masa:</label>
						<input type="text" id="txtMasa" name="txtMasa" value="10:30" placeholder="Masa"><br/>

						<label>Huraian:</label>
						<textarea id="txtHuraian" row="3" placeholder="Huraian"></textarea><br/>

						<label>Color:</label>
						<input type="color" id="txtColor" value="#ff0000"><br/>

			</div>
      <div class="modal-footer">
				<button type="button" id="btnTambah" class="btn btn-success" >Tambah</button>
				<button type="button" class="btn btn-success" >Ubah</button>
        <button type="button" id="btnPadam" class="btn btn-danger" >Padam</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

      <!-- End Modal -->
<?php include "footer.php"; ?>