			<!-- start footer Area -->		
			<section class="footer" style="background-color: #000; height: 100px">
                <div class="container">
                    <div class="row">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Hakcipta Terpelihara &copy;<script>document.write(new Date().getFullYear());</script> <a href="http://www.mbi.gov.my/" target="_blank">Majlis Bandaraya Ipoh</a> | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="https://www.facebook.com/MajlisBandarayaIpoh/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/mbi_citycouncil" target="_blank"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
				</div>
		</section>
			<!-- End footer Area -->		
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="./js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="./js/easing.min.js"></script>			
			<script src="./js/hoverIntent.js"></script>
			<script src="./js/superfish.min.js"></script>	
			<script src="./js/jquery.ajaxchimp.min.js"></script>
			<script src="./js/jquery.magnific-popup.min.js"></script>	
			<script src="./js/owl.carousel.min.js"></script>			
			<script src="./js/jquery.sticky.js"></script>
			<script src="./js/jquery.nice-select.min.js"></script>			
			<script src="./js/parallax.min.js"></script>		
			<script src="./js/mail-script.js"></script>	
			<script src="./js/main.js"></script>
			
			<!-- Full Calendar -->
			<script type="text/javascript">
			$(document).ready(function() {

			// page is now ready, initialize the calendar...

			$('#calendar').fullCalendar({
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
						$("#txtTarikh").val(date.format());
						$("#modalMesy").modal();
					},
					events:'http://localhost/MSS/mesyDB.php',
				
					eventClick:function(calEvent,jsEvent,view){
						
						$('#btnTambah').prop("disabled",true);
						$('#btnUbah').prop("disabled",false);
						$('#btnPadam').prop("disabled",false);

						// H2
						$('#tajukmesy').html(calEvent.title);

						// INFO
						$('#txtHuraian').val(calEvent.description);
						$('#txtID').val(calEvent.id);
						$('#txtmesy_nama').val(calEvent.title);
						$('#txtColor').val(calEvent.color);

						TarikhMasa= calEvent.start._i.split(" ");
						$('#txtTarikh').val(TarikhMasa[0]);
						$('#txtMasa').val(TarikhMasa[1]);

						$("#modalMesy").modal();
				},
				editable:true,
				eventDrop:function(calEvent){
					$('#txtID').val(calEvent.id);
					$('#txtmesy_nama').val(calEvent.title);
					$('#txtColor').val(calEvent.color);
					$('#txtHuraian').val(calEvent.description);
					
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
				id:$('#txtID').val(),
				title:$('#txtmesy_nama').val(),
				start:$('#txtTarikh').val()+" "+$('#txtMasa').val(),
				color:$('#txtColor').val(),
				description:$('#txtHuraian').val(),
				textColor:"#FFF",
				end:$('#txtTarikh').val()+" "+$('#txtMasa').val()
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
		function cleanForm(){
			$('#txtID').val('');
			$('#txtmesy_nama').val('');
			$('#txtColor').val('');
			$('#txtHuraian').val('');
		}
		</script>
		</body>
	</html>