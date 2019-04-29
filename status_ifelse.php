                <?php if($mesy_status_new == 'baru'){
                    ?>
                    <div class="w3-container">
                      <p><button class="w3-button w3-yellow">Baru</button></p>
                    </div>
                    <?php }
                else  if ($mesy_status_new == 'lulus'){ ?>   
                  <div class="w3-container">
                    <p><button class="w3-button w3-green">Lulus</button></p>
                  </div>
                  <?php } 
                else  if ($mesy_status_new == 'tidak lulus'){ ?>   
                  <div class="w3-container">
                    <p><button class="w3-button w3-red">Tidak lulus</button></p>
                  </div>
                  <?php } 
                else  if ($mesy_status_new == 'tunda'){ ?>   
                  <div class="w3-container">
                    <p><button class="w3-button w3-orange">Tunda</button></p>
                  </div>
                  <?php } 
                else  if ($mesy_status_new == 'batal'){ ?> 
                  <div class="w3-container">
                    <p><button class="w3-button w3-black">Batal</button></p>     
                  </div>  
                  <?php } ?>