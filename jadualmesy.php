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
<?php
$user_type = $userRow['user_type'];
  if($user_type == 'pentadbir'){
    include "adminpage/headeradmin.php";
  }
  else{
    include "headerhome.php";
  }
  ?>
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

<!-- Modal Mesy-->
<div class="modal fade multi-step" id="modalMesy" tabindex="-2" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="vertical-alignment-helper">
	<div class="modal-dialog modal-lg vertical-align-center">
    <div class="modal-content" style="height: 700px;">
      <div class="modal-header popupheader" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
				<div class="row">
					<div class="form-group col-md-12">
						<h5 class="modal-title" id="tajukmesy"></h5>
					</div>
				</div>
			</div>	
			<div class="modal-header" style="background-color: #fbc755; max-height: 80px;">	
					<div class="form-group col-md-12">
						<h4 class="modal-title step-1" data-step="1">Langkah 1</h4>
						<h4 class="modal-title step-2" data-step="2">Langkah 2</h4>
						<h4 class="modal-title step-3" data-step="3">Langkah 3</h4>
						<h4 class="modal-title step-4" data-step="4">Langkah 4</h4>
						<h4 class="modal-title step-5" data-step="5">Langkah Akhir</h4>
						<div class="m-progress"><!-- progress -->
							<div class="m-progress-stats">
								<span class="m-progress-current">
								</span>
								/
								<span class="m-progress-total">
								</span>
							</div>
							<div class="m-progress-complete">
								Lengkap
							</div>
						</div><!-- End progress -->
					</div>		
			</div>	
			<div class="form-row"><!-- Form row -->
				<div class="modal-body step-1" data-step="1"><!-- Tab 1 -->
					<div class="form-group col-md-12">
						<center><label><bold>Maklumat Mesyuarat</bold></label></center>
						<hr/>
					</div>
					<div class="form-group col-md-1">
						<label>ID:</label>
						<?php
						require_once('connection.php');
						$result = $conn->prepare("SELECT max(mesy_id) FROM mesy");
						$result->execute();
						$mesy_id = $result->fetchColumn();
						?>
						<input type="text" id="txtID" class="form-control" name="txtID" value=<?php echo $mesy_id ?> readonly><br/>
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
						<input type="color" name="txtColor" id="txtColor" class="form-control" disabled>
					</div>
					<div class="form-group col-md-3">
						<label>Status:</label>
						<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM status WHERE status_id!='1' && status_id!='5' && status_id!='6'");
								$result->execute();
								$status = $result->fetchAll(PDO::FETCH_ASSOC);
							?>
						<select id="txtStatus" name="txtStatus" class="form-control">
						<option selected="" status_id='1' value='1'>baru</option>
							<?php 
								foreach ($status as $output){ 
									echo "<option 'status_id='".$output['status_id']."'value='".$output['status_id']."'disabled=disabled'>".$output['status_nama']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group col-md-12"><!-- mesy -->
						<input type="radio" name="usage" id="usage-mesy" required>
						<label for="usage-mesy">Mesyuarat</label>

						<div class="reveal-if-active">
							<div class="form-group col-md-3">
								<label>Nama Mesyuarat:</label>
							</div>
							<div class="form-group col-md-9">
								<?php
									require_once('connection.php');
									$result = $conn->prepare("SELECT * FROM mesyuarat");
									$result->execute();
									$mesyuarat = $result->fetchAll(PDO::FETCH_ASSOC);
								?>
								<input type="text" placeholder="--- Pilih Nama Mesyuarat ---" class="flexlist form-control" 
								data-min-length="1" data-selection-required="true" list="txtmesy_nama1" id="txtmesy_nama" name="txtmesy_nama">
									<datalist id="txtmesy_nama1">
									<?php 
										foreach ($mesyuarat as $output){ 
											echo "<option mesy_kod='".$output['mesy_kod']."'value='".$output['mesy_kod']."'>".$output['mesy_nama']."</option>";
										}
									?>
									</datalist>
							</div>
							<div class="form-group col-md-3">
								<label>Bil:</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" id="txtbil" name="txtbil" class="form-control" data-require-pair="#usage-mesy" placeholder="cth: 159/01/19">
							</div>
							<br/>
						</div>
					</div> <!-- End mesy -->
				
					<div class="form-group col-md-12"> <!-- lain-lain -->
						<input type="radio" name="usage" id="usage-others">
						<label for="usage-others">Lain-lain</label>
					
						<div class="reveal-if-active">
							<div class="form-group col-md-3">
								<label>Nama Program:</label>
							</div>	
							<div class="form-group col-md-9">
								<input type="text" id="txtprog_nama" name="txtprog_nama" class="form-control" data-require-pair="#usage-others" placeholder="Nama Program" value="Program:">
							</div>
							<div class="form-group col-md-3">
								<label>Kod Program:</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" id="txtprog_kod" name="txtprog_kod" class="form-control" data-require-pair="#usage-others" placeholder="cth: KURSUS">
							</div>
							<br/>
						</div>
					</div><!-- End lain-lain -->
					<div class="form-group col-md-6">
						<label>Masa Mula:</label>
						<div class="input-group clockpicker" data-autoclose="true">
							<input type="text" id="txtMasaMula" name="txtMasaMula" class="form-control" placeholder="Masa Mula">
						</div>
					</div>
					<div class="form-group col-md-6">
						<label>Masa Tamat:</label>
						<div class="input-group clockpicker" data-autoclose="true">
							<input type="text" id="txtMasaTamat" name="txtMasaTamat" class="form-control" placeholder="Masa Tamat">
						</div>
					</div>
				</div><!-- End Tab 1 -->
				<div class="modal-body step-2" data-step="2"><!-- Tab 2 -->
					<div class="form-group col-md-12">
						<center><label><bold>Tujuan Penggunaan Bilik</bold></label></center>
						<hr/>
					</div>
					<div class="form-group col-md-12">
						<label>Huraian:</label>
						<textarea id="txtHuraian" rows="1" class="form-control" placeholder="Huraian"></textarea>
					</div>

						<div class="form-group col-md-12">
							<label for="txtlokasi">Lokasi:</label>
								<?php
									require_once('connection.php');
									$result = $conn->prepare("SELECT * FROM bilik");
									$result->execute();
									$bilik = $result->fetchAll(PDO::FETCH_ASSOC);
								?>
								<input type="text" placeholder="--- Pilih Lokasi ---" class="flexlist form-control" 
								data-min-length="1" data-selection-required="true" list="txtlokasi1" id="txtlokasi" name="txtlokasi">
								<datalist id="txtlokasi1">
									<?php 
										foreach ($bilik as $output){ 
											echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
										}
									?>
								</datalist>
						</div>
						<div class="form-group col-md-12">
							<label for="txturusetia">Jabatan/Urusetia Mesyuarat:</label>
								<?php
									require_once('connection.php');
									$result = $conn->prepare("SELECT * FROM jab");
									$result->execute();
									$jab = $result->fetchAll(PDO::FETCH_ASSOC);
								?>
								<!-- 
								<input type="text"
									placeholder="--- Pilih Jabatan ---"
									class="jablist form-control"
									data-data="jabDB.php"
									data-search-in="jab_nama"
									data-visible-properties="['jab_id','jab_nama']"
									data-selection-required="true"
									data-value-property="id"
									data-min-length="1"
									id="txturusetia"
									name="txturusetia"> -->
									<input type="text" placeholder="--- Pilih Jabatan ---" class="flexlist form-control" 
									data-min-length="1" data-selection-required="true" data-search-in="jab_id" list="txturusetia1" id="txturusetia" name="txturusetia">
									<datalist id="txturusetia1">
										<?php 
											foreach ($jab as $output){ 
											echo "<option jab_id='".$output['jab_id']."'value='".$output['jab_id']."'>".$output['jab_nama']."</option>";
											}
										?>
									</datalist>
						</div>
						<div class="form-group col-md-12">
							<label>Pengerusi:</label>
								<?php
									require_once('connection.php');
									$result = $conn->prepare("SELECT * FROM ahli");
									$result->execute();
									$ahli = $result->fetchAll(PDO::FETCH_ASSOC);
								?>
								<select id="txtpengerusi" name="txtpengerusi[]" class="chosen" multiple="multiple" data-placeholder="--- Pilih Pengerusi Mesyuarat ---">	
									<?php 
										if (! empty($ahli)) {
											foreach ($ahli as $key => $value){ 
												echo "<option ahli_id='".$ahli[$key]['ahli_id']."'value='".$ahli[$key]['ahli_id']."'>".$ahli[$key]['ahli_nama']." [".$ahli[$key][ ('ahli_id')]."]"."</option>";
											} 
											}
									?>
								</select>
						</div>
				</div><!-- End Tab 2 -->
				<div class="modal-body step-3" data-step="3"><!-- Tab 3 -->
					<div class="form-group col-md-12">
						<center><label><bold>Jemputan Ahli Mesyuarat</bold></label></center>
						<hr/>
					</div>
					<div class="form-group col-md-3">
						<label>Ahli Mesyuarat:</label>	
					</div>
					<div class="form-group col-md-9">
						<?php
							require_once('connection.php');
							$result = $conn->prepare("SELECT * FROM ahli");
							$result->execute();
							$ahli = $result->fetchAll(PDO::FETCH_ASSOC);
						?>	
						<!-- -<div>
							 <input type="checkbox" class="chk_boxes" label="check all"><b>Check all</b>
						</div>
						
						<br/>-->
						<?php 
							 //if (! empty($ahli)) {
								 //foreach ($ahli as $key => $value){ 
									 //echo "<input type='checkbox' ahli_id='".$ahli[$key]['ahli_id']."' name='txtmesy_ahli' name='txtmesy_ahli[]' class='chk_boxes1' value='".$ahli[$key]['ahli_id']."'>".$ahli[$key]['ahli_nama']." [".$ahli[$key][ ('ahli_id')]."]".'</br>';
								 //}
							 //}
						?>	
							<select id="txtmesy_ahli" name="txtmesy_ahli[]" class="chosen" multiple="multiple" data-placeholder="Pilih Ahli Mesyuarat...">	
								<option value="Tiada" >Tiada</option>			
									<?php 
									if (! empty($ahli)) {
										foreach ($ahli as $key => $value){ 
											echo "<option ahli_id='".$ahli[$key]['ahli_id']."'value='".$ahli[$key]['ahli_id']."'>".$ahli[$key]['ahli_nama']."</option>";
										} 
									}
									?>
							</select>				
					</div>
				</div><!-- End Tab 3 -->
				<div class="modal-body step-4" data-step="4"><!-- Tab 4 -->
					<div class="form-group col-md-12">
						<center><label><bold>Jemputan Agensi</bold></label></center>
						<hr/>
					</div>
					<div class="form-group col-md-12">
						<label for="txtagensi">Agensi:</label>
							<?php
								require_once('connection.php');
								$result = $conn->prepare("SELECT * FROM agensi");
								$result->execute();
								$agensi = $result->fetchAll(PDO::FETCH_ASSOC);
							?>	
							<select id="txtagensi" name="txtagensi[]" class="chosen" multiple="multiple" data-placeholder="Pilih Agensi...">	
								<option value="Tiada" >Tiada</option>			
									<?php 
									if (! empty($agensi)) {
										foreach ($agensi as $key => $value){ 
											echo "<option agensi_id='".$agensi[$key]['agensi_id']."'value='".$agensi[$key]['agensi_id']."'>".$agensi[$key]['agensi_nama']."</option>";
										} 
									}
									?>
							</select>
					</div>
				</div><!-- End Tab 4 -->

				<div class="modal-footer"> <!-- Modal Footer -->
					<div class="row">
						<div class="form-group col-md-4">
							<button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Kembali</button>
							<button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('#demo-modal-3', 2)">Seterusnya</button>
							<button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Kembali</button>
							<button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 3)">Seterusnya</button>
							<button type="button" class="btn btn-primary step step-4" data-step="4" onclick="sendEvent('#demo-modal-3', 3)">Kembali</button>
							<button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 4)">Seterusnya</button>
						</div>
						<div class="form-group col-md-8">
							<button type="button" id="btnTambah" class="btn btn-success step step-4" data-step="4">Mohon</button>
							<button type="button" id="btnUbah"class="btn btn-warning step step-4" data-step="4">Ubah</button>
							<button type="button" id="btnPadam" class="btn btn-danger step step-4" data-step="4">Batal</button>
							<button type="button" class="btn btn-primary step step-4" data-step="4" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div> <!-- End Modal Footer -->
				</div><!-- End Form row -->
		</div><!-- End content -->
  	</div>
		</div>
	</div>

      <!-- End Modal Mesy-->

	<!-- Checkall checkbox  -->
	<script type='text/javascript'>
	$(document).ready(function() {
		$('.chk_boxes').click(function(){
			$('.chk_boxes1').attr('checked','checked')
		})
	});
	//$(document).ready(function() {
		//$('.chk_boxes').click(function(){
		//var chk = $(this).attr('checked')?true:false;
		//$('.chk_boxes1').attr('checked',chk);
	//});
	</script>

	
			<?php include "footer.php"; ?>



			<!-- Additional frotm after checked Dropdown  -->
			<script type='text/javascript'>
							var FormStuff = {
								
								init: function() {
									this.applyConditionalRequired();
									this.bindUIActions();
								},
								
								bindUIActions: function() {
									$("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
								},
								
								applyConditionalRequired: function() {
									
									$(".require-if-active").each(function() {
										var el = $(this);
										if ($(el.data("require-pair")).is(":checked")) {
											el.prop("required", true);
										} else {
											el.prop("required", false);
										}
									});
									
								}
								
							};

							FormStuff.init();
						</script>
</body>
</html>