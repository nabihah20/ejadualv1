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
<section class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Jadual Mesyuarat</h2>
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
<div class="modal fade" id="modalMesy" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<h5 class="modal-title" id="tajukmesy"></h5>
      </div>
      <div class="modal-body">
				<div class="form-row">
					<div class="form-group col-md-1">
						<label>ID:</label>
						<input type="text" id="txtID" class="form-control" name="txtID" readonly><br/>
					</div>
					<div class="form-group col-md-2">
						<label>ID Staf:</label>
						<input type="text" id="txtUserID" class="form-control" name="txtUserID" readonly><br/>
					</div>
					<div class="form-group col-md-3">
						<label>Tarikh:</label>
						<input type="text" id="txtTarikh" class="form-control" name="txtTarikh" readonly><br/>
					</div>
					<div class="form-group col-md-3">
						<label>Warna:</label>
						<input type="color" id="txtColor" value="#ff0000" class="form-control">
					</div>
					<div class="form-group col-md-3">
						<label>Status:</label>
						<?php $status = '';
						if (isset($status)) { ?>
						<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM status WHERE ID=1");
								$result->execute();
								$status = $result->fetchAll(PDO::FETCH_ASSOC);
								
						?>
						<select id="txtStatus" name="txtStatus" class="form-control">
							<option selected="" disabled="">--- Pilih Status ---</option>
							<?php 
								foreach ($status as $output){ 
									echo "<option status_id='".$output['status_id']."'value='".$output['status_id']."'>".$output['status_nama']."</option>";
								}
							?>
							<?php } else {?>
							<input type="text" id="txtStatus" class="form-control" name="txtStatus" readonly><br/>
						<?php } ?>
						</select>
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
						<label for="txtlokasi">Lokasi:</label>
						<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM bilik");
								$result->execute();
								$bilik = $result->fetchAll(PDO::FETCH_ASSOC);
						?>
						<select id="txtlokasi" name="txtlokasi" class="form-control">
							<option selected="" disabled="">--- Pilih Bilik ---</option>
							<?php 
								foreach ($bilik as $output){ 
									echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label>Masa:</label>
						<div class="input-group clockpicker" data-autoclose="true">
							<input type="text" id="txtMasa" name="txtMasa" class="form-control" placeholder="Masa">
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="txturusetia">Urusetia:</label>
						<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM jab");
								$result->execute();
								$jab = $result->fetchAll(PDO::FETCH_ASSOC);
							?>
						<select id="txturusetia" name="txturusetia" class="form-control">
							<option selected="" disabled="">--- Pilih Jabatan ---</option>		
							<?php 
								foreach ($jab as $output){ 
								 echo "<option jab_id='".$output['jab_id']."'value='".$output['jab_id']."'>".$output['jab_nama']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>Pengerusi:</label>
						<input type="text" id="txtpengerusi" name="txtpengerusi" class="form-control" placeholder="Datuk Bandar">
					</div>
					<div class="form-group col-md-12">
						<center><label><bold>Jemputan Mesyuarat</bold></label></center>
						<center><small> (Sila tekan 'CTRL'+Klik ahli dan agensi untuk pilih lebih dari satu)</small></center>
						<hr/>
					</div>
					<div class="form-group col-md-6">
						<label>Ahli Mesyuarat:</label>
						<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM ahli");
								$result->execute();
								$ahli = $result->fetchAll(PDO::FETCH_ASSOC);
							?>	
							<select id="txtmesy_ahli" name="txtmesy_ahli[]" class="form-control" multiple="multiple">
							<option selected="" disabled="">--- Pilih Ahli Mesyuarat ---</option>				
							<?php 
							if (! empty($ahli)) {
								foreach ($ahli as $key => $value){ 
									echo "<option ahli_id='".$ahli[$key]['ahli_id']."'value='".$ahli[$key]['ahli_id']."'>".$ahli[$key]['ahli_nama']." [".$ahli[$key][ ('ahli_id')]."]"."</option>";
								 } 
								}
							?>
							</select>
					</div>
					<div class="form-group col-md-6">
						<label for="txtagensi">Agensi:</label>
						<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM agensi");
								$result->execute();
								$agensi = $result->fetchAll(PDO::FETCH_ASSOC);
							?>	
							<select id="txtagensi" name="txtagensi[]" class="form-control" multiple="multiple">
							<option selected="" disabled="">--- Pilih Agensi ---</option>		
							<option selected="" value="Tiada" >Tiada</option>			
							<?php 
							if (! empty($agensi)) {
								foreach ($agensi as $key => $value){ 
									echo "<option agensi_id='".$agensi[$key]['agensi_id']."'value='".$agensi[$key]['agensi_id']."'>".$agensi[$key]['agensi_nama']."</option>";
								 } 
								}
							?>
							</select>
      <!-- Example multi-select dropdown -->
							<!--<select id="Place" name="country[]" multiple="multiple">
							<option value="0" selected="selected">Select Country</option>
							<?php
									//if (! empty($countryResult)) {
											//foreach ($countryResult as $key => $value) {
													//echo '<option value="' . $countryResult[$key]['Country'] . '">' . $countryResult[$key]['Country'] . '</option>';
											//}
									//}
							?>
					</select>-->
      <!-- end Example multi-select dropdown -->
					</div>
				</div>
				<div class="modal-footer">
				<div class="form-group col-md-12">
					<button type="button" id="btnTambah" class="btn btn-success" >Tambah</button>
					<button type="button" id="btnUbah"class="btn btn-warning" >Ubah</button>
					<button type="button" id="btnPadam" class="btn btn-danger" >Padam</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
					</div>
				</div>
    	</div>
  	</div>
	</div>

      <!-- End Modal -->

			<?php include "footer.php"; ?>
</body>
</html>

			
