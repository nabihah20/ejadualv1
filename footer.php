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

  <script src="js/custom.js"></script>
  <script src="js/css3-animate-it.js"></script>
  <script src="contactform/contactform.js"></script>

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
						$('#txtmesy_ahli').val(calEvent.mesy_ahli);
						$('#txtlokasi').val(calEvent.mesy_lokasi);
						$('#txtTarikh').val(calEvent.mesy_tarikh);
						$("#txtUserID").val(calEvent.user_id);
						$('#txtStatus').val(calEvent.mesy_status);
						$('#txtagensi').val(calEvent.agensi_id);

						TarikhMasa= calEvent.start._i.split(" ");
						$('#txtTarikh').val(TarikhMasa[0]);
						$('#txtMasa').val(TarikhMasa[1]);

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
					$('#txtmesy_ahli').val(calEvent.mesy_ahli);
					$('#txtlokasi').val(calEvent.mesy_lokasi);
					$('#txtTarikh').val(calEvent.mesy_tarikh);
					$("#txtUserID").val(calEvent.user_id);
					$('#txtStatus').val(calEvent.mesy_status);
					$('#txtagensi').val(calEvent.agensi_id);

					var TarikhMasa=calEvent.start.format().split("T");
					$('#txtTarikh').val(TarikhMasa[0]);
					$('#txtMasa').val(TarikhMasa[1]);

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
				title:$('#txtmesy_nama').val(),
				start:$('#txtTarikh').val()+" "+$('#txtMasa').val(),
				color:$('#txtColor').val(),
				mesy_huraian:$('#txtHuraian').val(),
				textColor:"#FFF",
				end:$('#txtTarikh').val()+" "+$('#txtMasa').val(),

				jab_id:$('#txturusetia').val(),
				mesy_pengerusi:$('#txtpengerusi').val(),
				mesy_ahli:$('#txtmesy_ahli').val(),
				mesy_lokasi:$('#txtlokasi').val(),
				mesy_tarikh:$('#txtTarikh').val(),
				user_id:$('#txtUserID').val(),
				mesy_status:"proses",
				agensi_id:$('#txtagensi').val()	
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
					alert("Ada kesilapan..");
				}
			});
		}

		$('.clockpicker').clockpicker();
		
		//input yang user boleh isi
		function cleanForm(){
			$('#txtmesy_nama').val('');
			$('#txtStatus').val('');
			$('#txtColor').val('');
			$('#txtHuraian').val('');
			$('#txturusetia').val('');
			$('#txtpengerusi').val('');
			$('#txtmesy_ahli').val('');
			$('#txtlokasi').val('');
			$('#txtagensi').val('');
		}
		</script>

<!-- Insert value to textbox from dropdown -->
<script type="text/javascript">
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

</script>