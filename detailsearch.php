<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "header.php"; ?>

<!-- Section: about -->
<section id="bilik" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Carian Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <form method="post">
        <!-- Cari Tarikh -->
            <div class="form-group col-md-3">
                <label for="tarikh">Tarikh:</label>
            </div>
            <div class="form-group col-md-9">
                <input type="text" name="tarikh" id="tarikh" class="form-control">
            </div>
    <!-- Cari Bilik -->
            <div class="form-group col-md-3">
                <label for="bilik">Mengikut Lokasi:</label>
                <?php
                        require_once('connection.php');
                        $answer = $conn->prepare("SELECT * FROM bilik");
                        $answer->execute();
                        $bilik = $answer->fetchAll(PDO::FETCH_ASSOC);
                ?>
                </div>
                <div class="form-group col-md-9">
                <select id="bilik" name="bilik" class="form-control">
                    <option selected="" disabled="">--- Pilih Lokasi ---</option>
                    <?php 
                        foreach ($bilik as $output){ 
                            echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
                        }
                    ?>
                </select>
            </div>
    <!-- Cari Urusetia -->
            <div class="form-group col-md-3">
                <label for="urusetia">Mengikut Urusetia:</label>
                </div>
                <div class="form-group col-md-9">
                <?php
                        require_once('connection.php');
                        $result = $conn->prepare("SELECT * FROM jab");
                        $result->execute();
                        $jab = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select id="urusetia" name="urusetia" class="form-control">
                    <option selected="" disabled="">--- Pilih Urusetia ---</option>
                    <?php 
                        foreach ($jab as $output){ 
                            echo "<option jab_id='".$output['jab_id']."'value='".$output['jab_id']."'>".$output['jab_nama']."</option>";
                        }
                    ?>
                </select>
            </div>
    <!-- Button -->
            <div class="form-group col-md-9">
                <label for="btnCari"></label>
            </div>
            <div class="form-group col-md-3" style="text-align:right;">
                <button type="submit" id="btnCari" name="btnCari" class="btn btn-success" >Cari Mesyuarat</button>
            </div>
            <br/>
            </form> 
            <div class="col-md-12">
            <hr/>
            </div> 
    <!-- Hasil -->  
            <div class="row">
                <div class="form-group col-md-12">    
                    <label>Hasil Carian</label>
                    <br/>         
                    <div class="box">
                        <div class="block" id="forms">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                <thead>
                                    <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                <thead>
                                <br/>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Perkara </th>
                                        <th>Tarikh</th>
                                        <th>Waktu</th>
                                        <th>Lokasi</th>
                                        <th>Urusetia</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php
                                include('connection.php');
                                if(isset($_POST['btnCari'])){
                                    $mesy_tarikh = $_POST['tarikh'];
                                    // to set that date format same as in database
                                    $mtarikh = strtotime ($mesy_tarikh);
                                    $mtarikh = date ("Y/m/d", $mtarikh);
                                    $mesy_lokasi = $_POST['bilik'];
                                    $jab_id = $_POST['urusetia'];
                                    //SELECT * FROM ((mesy 
                                    //INNER JOIN bilik ON mesy.mesy_lokasi = bilik.bilik_nama)
                                    //INNER JOIN jab ON mesy.jab_id = jab.jab_nama)
                                    if($mtarikh != "" || $mesy_lokasi != "" || $jab_id != ""  ){
                                        $sql = "SELECT * FROM mesy 
                                        WHERE mesy_tarikh = '$mtarikh' AND  mesy_lokasi='$mesy_lokasi' AND jab_id = '$jab_id'";
                                        $statement = $conn->prepare($sql);
                                        $statement->execute();
                                
                                        $result = $statement->fetchAll();
                                        if ($result && $statement->rowCount() > 0) {
                                        //if(mysqli_num_query($data) > 0){
                                            $counter = 1; 
                                            foreach ($result as $row) {
                                                
                                                $title = $row['title'];
                                                $mtarikh = $row['mesy_tarikh'];
                                                $start = $row['start'];
                                                $mesy_lokasi = $row['mesy_lokasi'];
                                                $jab_id = $row['jab_id'];
        

                                                ?>
                                                <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php echo $mtarikh; ?></td>
                                                <td><?php echo $start; ?></td>
                                                <td><?php echo $mesy_lokasi; ?></td>
                                                <td><?php echo $jab_id; ?></td>
                                                </tr>
                                                <?php $counter++; 
                                            }

                                        } else {
                                            ?> 
                                            <tr>
                                                <td>Mesyuarat tidak dijumpai</td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                </tbody>
                            </table> 
                        </div>                      
                    </div>

        </div>  
    </div>   
</section>
  <!-- /Section: about -->

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
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/css3-animate-it.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script type="text/javascript">
    $(function(){
      $("#tarikh").datepicker();
    });
  </script>

</body>
</html>