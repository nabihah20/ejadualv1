<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "header.php"; ?>

<!-- Section: about -->
<section id="bilik" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Carian Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Masukkan Bulan -->
    <div class="container">
      <div class="row">
        <form method="post">
            <div class="form-group col-md-8">
                <label for="bulan">Mengikut Bulan:</label>
                <?php
                        require_once('connection.php');
                        $result = $conn->prepare("SELECT * FROM bulan");
                        $result->execute();
                        $bulan = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select id="bulan" name="bulan" class="form-control">
                    <option selected="" disabled="">--- Pilih Bulan ---</option>
                    <?php 
                        foreach ($bulan as $output){ 
                            echo "<option bulan_id='".$output['bulan_id']."'value='".$output['bulan_id']."'>".$output['bulan_nama']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <br/><button type="button" id="btnCariB" class="btn btn-success" >Cari</button>
            </div>
        </form>
        <!-- End Masukkan Bulan -->

            <!-- Masukkan Bilik -->
    <div class="container">
      <div class="row">
        <form method="post">
            <div class="form-group col-md-8">
                <label for="bilik">Mengikut Lokasi:</label>
                <?php
                        require_once('connection.php');
                        $answer = $conn->prepare("SELECT * FROM bilik");
                        $answer->execute();
                        $bilik = $answer->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select id="bilik" name="bilik" class="form-control">
                    <option selected="" disabled="">--- Pilih Lokasi ---</option>
                    <?php 
                        foreach ($bilik as $output){ 
                            echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <br/><button type="submit" id="btnCariL" name="btnCariL" class="btn btn-success" >Cari</button>
            </div>
        </form>

        <!-- End Masukkan Bilik -->
            <!-- Masukkan Tarikh -->
    <div class="container">
      <div class="row">
        <form method="post">
            <div class="form-group col-md-8">
                <label for="tarikh">Mengikut Tarikh:</label>
                <br/><input type="text" name="tarikh" id="tarikh" class="form-control" value="2019-01-01">
            </div>
            <div class="form-group col-md-4">
            <br/><button type="submit" id="btnCariT" name="btnCariT" class="btn btn-success" >Cari</button>
            </div>
        </form>
        <!-- End Masukkan Tarikh -->
            <!-- Masukkan Urusetia -->
    <div class="container">
      <div class="row">
        <form method="post">
            <div class="form-group col-md-8">
                <label for="urusetia">Mengikut Urusetia:</label>
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
            <div class="form-group col-md-4">
            <br/><button type="submit" id="btnCariU" name="btnCariU" class="btn btn-success" >Cari</button>
            </div>
        </form>
        <!-- End Masukkan Urusetia -->
        <!-- Masukkan UserID -->
            <div class="container">
      <div class="row">
        <form method="post">
            <div class="form-group col-md-8">
                <label for="urusetia">Mengikut ID Staf:</label>
                <?php
                        require_once('connection.php');
                        $result = $conn->prepare("SELECT * FROM users");
                        $result->execute();
                        $users = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <select id="user" name="user" class="form-control">
                    <option selected="" disabled="">--- Pilih ID Staf ---</option>
                    <?php 
                        foreach ($users as $output){ 
                            echo "<option user_name='".$output['user_name']."'value='".$output['user_name']."'>".$output['user_id']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <br/><button type="submit" id="btnCariID" name="btnCariID" class="btn btn-success" >Cari</button>
            </div>
        </form>
        <!-- End Masukkan UserID -->
        <!-- Hasil Carian -->
        <div class="container">
        <br/><hr/>
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
                    <!-- Carian Bulan -->
                      <?php
                        include('connection.php');
                        if(isset($_POST['btnCariB'])){
                            $mesy_bulan = $_POST['bulan'];

                            if($mesy_lokasi != ""){
                                $sql = "SELECT * FROM mesy 
                                WHERE mesy_bulan='$mesy_bulan'";
                                $statement = $conn->prepare($sql);
                                $statement->execute();
                                $result = $statement->fetchAll();

                                if ($result && $statement->rowCount() > 0) {
                                //if(mysqli_num_query($data) > 0){
                                    $counter = 1; 
                                    foreach ($result as $row) {
                                        
                                        $title = $row['title'];

                                        $mesy_tarikh = $row['mesy_tarikh'];
                                        $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%y') FROM mesy
                                        WHERE mesy_bulan='$mesy_bulan'");
                                        $mesy_tarikh_new=$sql->fetchColumn();

                                        $start = $row['start'];
                                        $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
                                        WHERE mesy_bulan='$mesy_bulan'");
                                        $start_new=$sql->fetchColumn();

                                        $mesy_lokasi = $row['mesy_lokasi'];
                                        $jab_id = $row['jab_id'];
                        ?>
                        <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $mesy_tarikh_new; ?></td>
                        <td><?php echo $start_new; ?></td>
                        <td><?php echo $mesy_lokasi; ?></td>
                        <td><?php echo $jab_id; ?></td>
                        </tr>
                        <?php $counter++; 
                    }

                } else {
                    ?> 
                    <tr>
                        <td>Tiada mesyuarat pada bulan <?php echo ($_POST['bulan']); ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
<!-- End Carian Bulan -->
                    <!-- Carian Lokasi -->
                      <?php
                        include('connection.php');
                        if(isset($_POST['btnCariL'])){
                            $mesy_lokasi = $_POST['bilik'];

                            if($mesy_lokasi != ""){
                                $sql = "SELECT * FROM mesy 
                                WHERE mesy_lokasi='$mesy_lokasi'";
                                $statement = $conn->prepare($sql);
                                $statement->execute();
                                $result = $statement->fetchAll();

                                if ($result && $statement->rowCount() > 0) {
                                //if(mysqli_num_query($data) > 0){
                                    $counter = 1; 
                                    foreach ($result as $row) {
                                        
                                        $title = $row['title'];

                                        $mesy_tarikh = $row['mesy_tarikh'];
                                        $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%y') FROM mesy
                                        WHERE mesy_lokasi='$mesy_lokasi'");
                                        $mesy_tarikh_new=$sql->fetchColumn();

                                        $start = $row['start'];
                                        $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
                                        WHERE mesy_lokasi='$mesy_lokasi'");
                                        $start_new=$sql->fetchColumn();

                                        $mesy_lokasi = $row['mesy_lokasi'];
                                        $jab_id = $row['jab_id'];
                        ?>
                        <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $mesy_tarikh_new; ?></td>
                        <td><?php echo $start_new; ?></td>
                        <td><?php echo $mesy_lokasi; ?></td>
                        <td><?php echo $jab_id; ?></td>
                        </tr>
                        <?php $counter++; 
                    }

                } else {
                    ?> 
                    <tr>
                        <td>Tiada mesyuarat di bilik <?php echo ($_POST['bilik']); ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
        <!-- End Carian Lokasi -->
              <!-- Carian Tarikh -->
                            <?php
                        include('connection.php');
                        if(isset($_POST['btnCariT'])){
                            $mesy_tarikh = $_POST['tarikh'];
                            // to set that date format same as in database
                            $mtarikh = strtotime ($mesy_tarikh);
                            $mtarikh = date ("Y/m/d", $mtarikh);

                            if($mtarikh != ""){
                                $sql = "SELECT * FROM mesy 
                                WHERE mesy_tarikh='$mtarikh'";
                                $statement = $conn->prepare($sql);
                                $statement->execute();
                                $result = $statement->fetchAll();

                                if ($result && $statement->rowCount() > 0) {
                                //if(mysqli_num_query($data) > 0){
                                    $counter = 1; 
                                    foreach ($result as $row) {
                                        
                                        $title = $row['title'];

                                        $mtarikh = $row['mesy_tarikh'];
                                        $sql = $conn->query("SELECT DATE_FORMAT('$mtarikh', '%d/%m/%y') FROM mesy
                                        WHERE mesy_tarikh='$mtarikh'");
                                        $mtarikh_new=$sql->fetchColumn();

                                        $start = $row['start'];
                                        $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
                                        WHERE mesy_tarikh='$mtarikh'");
                                        $start_new=$sql->fetchColumn();

                                        $mesy_lokasi = $row['mesy_lokasi'];
                                        $jab_id = $row['jab_id'];
                        ?>
                        <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $mtarikh_new; ?></td>
                        <td><?php echo $start_new; ?></td>
                        <td><?php echo $mesy_lokasi; ?></td>
                        <td><?php echo $jab_id; ?></td>
                        </tr>
                        <?php $counter++; 
                    }

                } else {
                    ?> 
                    <tr>
                        <td>Tiada mesyuarat pada tarikh <?php echo ($_POST['tarikh']); ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
        <!-- End Carian Tarikh -->
        <!-- Carian Urusetia -->
        <?php
                        include('connection.php');
                        if(isset($_POST['btnCariU'])){
                            $jab_id = $_POST['urusetia'];

                            if($jab_id != ""){
                                $sql = "SELECT * FROM mesy 
                                WHERE jab_id='$jab_id'";
                                $statement = $conn->prepare($sql);
                                $statement->execute();
                                $result = $statement->fetchAll();

                                if ($result && $statement->rowCount() > 0) {
                                //if(mysqli_num_query($data) > 0){
                                    $counter = 1; 
                                    foreach ($result as $row) {
                                        
                                        $title = $row['title'];

                                        $mesy_tarikh = $row['mesy_tarikh'];
                                        $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%y') FROM mesy
                                        WHERE jab_id='$jab_id'");
                                        $mesy_tarikh_new=$sql->fetchColumn();

                                        $start = $row['start'];
                                        $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
                                        WHERE jab_id='$jab_id'");
                                        $start_new=$sql->fetchColumn();

                                        $mesy_lokasi = $row['mesy_lokasi'];
                                        $jab_id = $row['jab_id'];
                        ?>
                        <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $mesy_tarikh_new; ?></td>
                        <td><?php echo $start_new; ?></td>
                        <td><?php echo $mesy_lokasi; ?></td>
                        <td><?php echo $jab_id; ?></td>
                        </tr>
                        <?php $counter++; 
                    }

                } else {
                    ?> 
                    <tr>
                        <td>Tiada mesyuarat dari jabatan <?php echo ($_POST['urusetia']); ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
        <!-- End Carian Urusetia -->
                <!-- Carian UserID -->
                <?php
                        include('connection.php');
                        if(isset($_POST['btnCariID'])){
                            $user_name = $_POST['user'];

                            if($user_name != ""){
                                $sql = "SELECT * FROM users 
                                WHERE user_name='$user_name'";
                                $statement = $conn->prepare($sql);
                                $statement->execute();
                                $result = $statement->fetchAll();

                                if ($result && $statement->rowCount() > 0) {
                                //if(mysqli_num_query($data) > 0){
                                    $counter = 1; 
                                    foreach ($result as $row) {
                                        
                                        $user_name = $row['user_name'];
                        ?>
                        <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $user_name; ?></td>
                        </tr>
                        <?php $counter++; 
                    }

                } else {
                    ?> 
                    <tr>
                        <td>Tiada mesyuarat dari ID Staf <?php echo ($_POST['user']); ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
        <!-- End Carian Urusetia -->
                                </tbody>
                            </table> 
                        </div>                      
                    </div>

        </div>  
    </div>  
    </div>
            <!-- End Hasil Carian -->
            
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