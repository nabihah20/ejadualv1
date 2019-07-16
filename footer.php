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
            | Direka oleh <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
	<script src="js/multi-step-modal.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/css3-animate-it.js"></script>
  <script src="contactform/contactform.js"></script>
	<!-- Select2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <!-- FlexDataList -->
	<script src="js/jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.js"></script>
			<!-- Full Calendar -->
			<script type="text/javascript">
			$(document).ready(function() {

			// page is now ready, initialize the calendar...

			$('#calendar').fullCalendar({

				locale: 'ms-my',
					today: 'hari ini',
					prev: 'seb',
					next: 'sel',
					header:{
						left: 'today,prev,next',
						center: 'title',
						right:'month,basicWeek,basicDay, agendaWeek,agendaDay'
					},

					dayClick:function(date,jsEvent,view){
						$('#btnTambah').prop("disabled",false);
						$('#btnUbah').prop("disabled",true);
						$('#btnPadam').prop("disabled",true);

						cleanForm();
						// input yang generate by system
						$("#txtTarikh").val(date.format());
						$("#txtUserID").val(<?php echo $userRow['id']; ?>);
						
						$("#modalMesy").modal();
					},
					events:'http://localhost/ejadualv1/mesyDB.php',
				
					eventClick:function(calEvent,jsEvent,view){
						
						$('#btnTambah').prop("disabled",true);
						$('#btnUbah').prop("disabled",false);
						$('#btnPadam').prop("disabled",false);

						// H2
						$('#tajukmesy').html(calEvent.title);

						// INFO
						$('#txtHuraian').val(calEvent.mesy_huraian);
						$('#txtID').val(calEvent.mesy_id);
						$('#txtmesy_nama').val(calEvent.title);
						$('#txtColor').val(calEvent.color);
						$('#txturusetia').val(calEvent.jab_id);
						$('#txtpengerusi').val(calEvent.mesy_pengerusi);
						
						$('#txtlokasi').val(calEvent.mesy_lokasi);
						$('#txtTarikh').val(calEvent.mesy_tarikh);
						$("#txtUserID").val(calEvent.user_id);
						$('#txtStatus').val(calEvent.mesy_status);
						
						$('#txtmesy_ahli').val(calEvent.mesy_ahli);
						$('#txtagensi').val(calEvent.agensi_id);

						$('#txtbil').val(calEvent.bil);
						$('#txtprog_nama').val(calEvent.title);
						$('#txtprog_kod').val(calEvent.prog_kod);

						TarikhMasa= calEvent.start._i.split(" ");
						$('#txtTarikh').val(TarikhMasa[0]);
						$('#txtMasaMula').val(TarikhMasa[1]);

						TarikhMasa= calEvent.end._i.split(" ");
						$('#txtTarikh').val(TarikhMasa[0]);
						$('#txtMasaTamat').val(TarikhMasa[1]);

						$("#modalMesy").modal();
				},
				editable:true,
				eventDrop:function(calEvent){
					$('#txtID').val(calEvent.mesy_id);
					$('#txtmesy_nama').val(calEvent.title);
					
					$('#txtColor').val(calEvent.color);
					$('#txtHuraian').val(calEvent.mesy_huraian);
					
					$('#txturusetia').val(calEvent.jab_id);
					$('#txtpengerusi').val(calEvent.mesy_pengerusi);
					$('#txtlokasi').val(calEvent.mesy_lokasi);
					$('#txtTarikh').val(calEvent.mesy_tarikh);
					$("#txtUserID").val(calEvent.user_id);
					$('#txtStatus').val(calEvent.mesy_status);

					$('#txtmesy_ahli').val(calEvent.mesy_ahli);
					$('#txtagensi').val(calEvent.agensi_id);

					$('#txtbil').val(calEvent.bil);
					$('#txtprog_nama').val(calEvent.title);
					$('#txtprog_kod').val(calEvent.prog_kod);

					var TarikhMasa=calEvent.start.format().split("T");
					$('#txtTarikh').val(TarikhMasa[0]);
					$('#txtMasaMula').val(TarikhMasa[1]);
					
					var TarikhMasa=calEvent.end.format().split("T");
					$('#txtTarikh').val(TarikhMasa[0]);
					$('#txtMasaTamat').val(TarikhMasa[1]);

					KumpulDataGUI();
					SubmitInformation('edit',MesyBaru,true);
				}
			});

		});
		</script>

		<script>
		var MesyBaru;

		$('#btnTambah').click(function(){
			KumpulDataGUI();
			SubmitInformation('add',MesyBaru);
		});

		$('#btnPadam').click(function(){
			KumpulDataGUI();
			SubmitInformation('delete',MesyBaru);
		});

		$('#btnUbah').click(function(){
			KumpulDataGUI();
			SubmitInformation('edit',MesyBaru);
		});

		function KumpulDataGUI(){
			MesyBaru= {
				mesy_id:$('#txtID').val(),
				title:$('#txtmesy_nama').val() || $('#txtprog_nama').val(),
				start:$('#txtTarikh').val()+" "+$('#txtMasaMula').val(),
				color:"#ffeb3b",
				textColor:"#000",
				mesy_huraian:$('#txtHuraian').val(),
				end:$('#txtTarikh').val()+" "+$('#txtMasaTamat').val(),

				jab_id:$('#txturusetia').val(),
				mesy_pengerusi:$('#txtpengerusi').val(),
				//mesy_ahli:$("input[type=checkbox][name=txtmesy_ahli]:checked" ).val(),
				//mesy_ahli:$('#txtmesy_ahli').val(),
				//$('input:checkbox[name=txtmesy_ahli]').each(function() 
				//{    
					//if($(this).is(':checked'))
					//alert($(this).val());
				//});
				//mesy_ahli:$('#txtmesy_ahli').find(":checkbox").val(),
				mesy_ahli:$('#txtmesy_ahli').val(),
				//- mesy_ahli: $('#txtmesy_ahli').prop('checked'),
				mesy_lokasi:$('#txtlokasi').val(),
				mesy_tarikh:$('#txtTarikh').val(),
				user_id:$('#txtUserID').val(),
				mesy_status:"1",
				agensi_id:$('#txtagensi').val(),

				bil:$('#txtbil').val(),
				prog_nama:$('#txtprog_nama').val(),
				prog_kod:$('#txtprog_kod').val()
			};
		}
		function SubmitInformation(action,objEvent,modal){
			$.ajax({
				type:'POST',
				url:'mesyDB.php?action='+action,
				data:objEvent,
				success:function(msg){
					if(msg){
						$('#calendar').fullCalendar('refetchEvents');
						if(!modal){
							$("#modalMesy").modal('toggle');
						}
						
					}
				},
				error:function(){
					alert("Data berjaya disimpan namun terdapat kesilapan..Sila 'refresh' laman web ini untuk lihat mesyuarat baru");
				}
			});
		}

		$('.clockpicker').clockpicker();
		
		//input yang user boleh isi
		function cleanForm(){
			$('#txtmesy_nama').val('');
			$('#txtStatus').val('');
			$('#txtColor').val('#ffeb3b');
			$('#txtHuraian').val('');
			$('#txturusetia').val('');
			//$('#txtpengerusi').prop('checked', true);
			$('#txtpengerusi').val('');
			//$("input[type=checkbox][name=txtmesy_ahli]:checked" ).val('');
			//$('.get_value').each(function(){
				//if($(this).is(":checked"))
				//{
				//insert.push($(this).val());
				//}
			//});
			//$('input:checkbox[name=txtmesy_ahli]').each(function() 
			//{    
				//if($(this).is(':checked'))
				//alert($(this).val(''));
			//});
			$('#txtmesy_ahli').val('');
			$('#txtlokasi').val('');
			$('#txtagensi').val('');
			$('#txtbil').val('');
			$('#txtprog_nama').val('Program: ');
			$('#txtprog_kod').val('');
		}
		</script>
		
<!-- Search name in dropdown -->
	<!-- Using chosen -->
	<script type="text/javascript">
	$(document).ready(function(e){
		$(".chosen").chosen({
			width:"100%"
		});
	});
	</script>

	<!-- Using Select2 -->
	<!--<script type="text/javascript">
	$(document).ready(function(e) {
		$(".usingSelect2").select2({
			tags: true,
			ajax: {
			url: "fetch.php",
				processResults: function (data, page) {
					return {
						results: data
					};
				}
			}
		});
	});
	</script>-->

	<!-- Using FlexDataList -->
	<script type="text/javascript">
	$(document).ready(function(){
	$(".flexlist").flexdatalist({
			width:"100%",
			selectionRequired: true,
			minLength: 1,
			searchContain: true,
			searchIn: 'value',
			searchDelay: 100,
			noResultsText:"Tiada data {keyword} dijumpai"
		});
	});
	</script>
	<!-- Using FlexDataList -->
	<script type="text/javascript">
	$(document).ready(function(){
	$(".flexmultilist").flexdatalist({
			width:"100%",
			selectionRequired: 1,
			minLength: 1,
			searchContain: true,
			searchIn: 'value',
			searchDelay: 100,
			noResultsText:"Tiada data {keyword} dijumpai"
		});
	});
	</script>

	<!--<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
		type: "GET",
		url: "jabDB.php",
		dataType: "json",
		success: function(data) {
				// data will contain var1 and var2
			$('.jablist').flexdatalist({
				minLength: 1,
				valueProperty: 'id',
				selectionRequired: true,
				visibleProperties: ["jab_nama","jab_id"],
				searchIn: 'jab_nama',
				data: 'jabDB.php'
			});
		},
		error: function(data) {
					alert("Problem - perhaps malformed JSON?");
		}
		});
	});
	</script>-->

<!-- Insert value to textbox from dropdown -->
<!-- <script type="text/javascript">
// Pure JS

document.getElementById("selectname").onchange = function() {
  var e = document.getElementById("selectname");
  var strUser = e.options[e.selectedIndex].value;
  document.getElementById("username").value = strUser;
};

// jQuery

$('body').on('change', '#selectname', function() {
$('#username2').val($('#selectname option:selected').val());
});

</script>-->

<!-- PROCESS FORM -->
<script type="text/javascript">
sendEvent = function(sel, step) {
    var sel_event = new CustomEvent('next.m.' + step, {detail: {step: step}});
    window.dispatchEvent(sel_event);
}

</script>