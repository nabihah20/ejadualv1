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
<?php include "adminpage/headeradmin.php"; ?>

<!-- Section: about -->
<section id="profil" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Maklumat Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="paging">

        <!-- "Lead" text at top of column. -->
        <p class="lead">Senarai Mesyuarat yang didaftarkan</p>
        <div class="row">
            <div class="form-group col-md-12" style="text-align:right;">
            <?php 
            echo '<a href="jadualmesy.php" class="btn btn-info" role="button" onClick="return confirm(\'Anda pasti untuk TAMBAH mesyuarat ?\');">
            <span class="glyphicon glyphicon-plus"></span> Tambah</a>'; ?> &emsp;
            </div>
        </div>
        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />
        <table class="table table-hover table-dark">
          <?php
            $page = @$_GET['page'];
  
            if($page == 0 || $page == 1){
              $page1 = 0;	
            }
            else {
              $page1 = ($page * 10) - 10;	
            }
            include('connection.php');
              $sql = "SELECT * FROM mesy 
              LIMIT $page1, 10";
              $statement = $conn->prepare($sql);
              $statement->execute();
              $result = $statement->fetchAll();
              
             if ($result && $statement->rowCount() > 0) {
          ?>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tarikh</th>
                  <th scope="col">Masa</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Status</th>
                  <th scope="col">Tindakan</th>
                </tr>
              </thead>
            <?php
              $counter = 1; 
              foreach ($result as $row) {
                  $mesy_id = $row['mesy_id'];
                  $title = $row['title'];
                  $mesy_tarikh = $row['mesy_tarikh'];
                  $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%y') FROM mesy");
                  $mesy_tarikh_new=$sql->fetchColumn();
                  
                  $start=$row['start'];
                  $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy");
                  $start_new=$sql->fetchColumn();

                  $mesy_lokasi = $row['mesy_lokasi'];
                  $mesy_status = $row['mesy_status'];
                  $sql = $conn->query("SELECT status_nama FROM status
                  WHERE status_id='$mesy_status'");
                  $mesy_status_new=$sql->fetchColumn();

            ?>

            <tbody>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo '<a href="lihatMesy.php?ID='.$mesy_id.'">'.$title.'</a>'; ?></td>
                <td><?php echo $mesy_tarikh_new; ?></td>
                <td><?php echo $start_new; ?></td>
                <td><?php echo $mesy_lokasi; ?></td>
                <td>
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
                </td>
                <td>
                <?php 
                echo '<a href="padamMesy.php?ID='.$mesy_id.'" onClick="return confirm(\'Anda pasti untuk PADAM '.$title.' ?\');">
                <span class="glyphicon glyphicon-trash"></span>
                </a>'; ?> &emsp;
                <?php
                echo '<a href="ubahMesy.php?ID='.$mesy_id.'" onClick="return confirm(\'Anda pasti untuk UBAH '.$title.' ?\');">
                <span class="glyphicon glyphicon-pencil"></span>
                </a>'; 
                ?>
                </td>
              </tr>
            <?php $counter++; 
        }

    } else {
        ?> 
        <tr>
            <td>Tiada mesyuarat didaftarkan lagi</td>
        </tr>
<?php
    }
?>
          </tbody>
        </table>	
        <ul class="pagination pagination-lg">
        <?php
		  $q = $conn->query("SELECT * FROM mesy");
          $rows = $q->fetchAll(PDO::FETCH_ASSOC);
          $total = ceil(count($rows)/10);

				?>

        <?php for ($i = 1; $i <=  $total; $i++) {?>
          <li><a href="addMesy.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
        <?php } ?>
        </ul>
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

</body>
</html>