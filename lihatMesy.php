<?php
	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['ID'])) {
    include('connection.php');
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM mesy 
    WHERE mesy_id='$ID'";
    $statement = $conn->prepare($sql);
    $statement->execute(array(":mesy_id"=>$ID));
    $mesyRow=$statement->fetch(PDO::FETCH_ASSOC);

} else {
  header('Location: login.php');
}
?>

<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "headerhome.php"; ?>

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
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID:</label>
            </div>
            <div class="form-group col-md-7">
            <?php echo $mesyRow['mesy_id'];?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Nama Mesyuarat:</label>
            </div>
            <div class="form-group col-md-7">
            <?php echo $mesyRow['title']; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Huraian:</label>
            </div>
            <div class="form-group col-md-7">
            <?php echo $mesyRow['mesy_huraian']; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Tarikh:</label>
            </div>
            <div class="form-group col-md-7">
            <?php
            $mesy_tarikh = $mesyRow['mesy_tarikh'];
            $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%Y') FROM mesy
            WHERE mesy_id='$ID'");
            $mesy_tarikh_new=$sql->fetchColumn();
            ?>
            <?php echo $mesy_tarikh_new; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Masa:</label>
            </div>
            <div class="form-group col-md-7">
            <?php
            $start=$mesyRow['start'];
            
            $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
            WHERE mesy_id='$ID'");
            $start_new=$sql->fetchColumn();
            ?>
            <?php echo $start_new; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Lokasi:</label>
            </div>
            <div class="form-group col-md-7">
            <?php
            $mesy_lokasi = $mesyRow['mesy_lokasi'];
            $sql = $conn->query("SELECT bilik_nama FROM bilik
            WHERE bilik_id='$mesy_lokasi'");
            $bilik_nama=$sql->fetchColumn();
            ?>
            <?php echo $bilik_nama; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Urusetia:</label>
            </div>
            <div class="form-group col-md-7">
            <?php
            $jab_id = $mesyRow['jab_id'];
            $sql = $conn->query("SELECT jab_nama FROM jab
            WHERE jab_id='$jab_id'");
            $jab_nama=$sql->fetchColumn();
            ?>
            <?php echo $jab_nama; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Pengerusi:</label>
            </div>
            <div class="form-group col-md-7">
            <?php echo $mesyRow['mesy_pengerusi']; ?>
            </div>
        </div>  
        <div class="row">
            <div class="form-group col-md-2">
            <label>Ahli Mesyuarat:</label>
            </div>
            <div class="form-group col-md-7">
            <table>
            <?php
            if (isset($_GET['ID'])) {
                include('connection.php');
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM mesy_ahli
                WHERE mesy_id='$ID'";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $ahliRow=$statement->fetchAll(PDO::FETCH_ASSOC);
                if ($ahliRow && $statement->rowCount() > 0) { 

                $counter = 1; 
                foreach ($ahliRow as $row) {
                    $ahli_id = $row['ahli_id'];

                    $sql = $conn->query("SELECT ahli_nama FROM ahli
                    WHERE ahli_id='$ahli_id'");
                    $ahli_id_new=$sql->fetchColumn();
            ?>
                <tr>
                    <td><?php echo $counter; ?>. <?php echo $ahli_id_new; ?></td>
                </tr>
                <?php $counter++;
                }
                } else {
                    ?> 
                <tr>
                    <td>Tiada ahli mesyuarat yang didaftarkan lagi</td>
                </tr>
            <?php
                }
            } else {
                ?> 
            <tr>
                <td>Tidak dapat data</td>
            </tr>
            <?php } ?>
            <tbody>
            </table>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Agensi:</label>
            </div>
            <div class="form-group col-md-7">
            <table>
            <?php
            if (isset($_GET['ID'])) {
                include('connection.php');
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM mesy_agensi
                WHERE mesy_id='$ID'";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $agensiRow=$statement->fetchAll(PDO::FETCH_ASSOC);
                if ($agensiRow && $statement->rowCount() > 0) { 

                $counter = 1; 
                foreach ($agensiRow as $row) {
                    $agensi_id = $row['agensi_id'];

                    $sql = $conn->query("SELECT agensi_nama FROM agensi
                    WHERE agensi_id='$agensi_id'");
                    $agensi_id_new=$sql->fetchColumn();
            ?>
                <tr>
                    <td><?php echo $counter; ?>. <?php echo $agensi_id_new; ?></td>
                </tr>
                <?php $counter++;
                }
                } else {
                    ?> 
                <tr>
                    <td>Tiada agensi yang didaftarkan lagi</td>
                </tr>
            <?php
                }
            } else {
                ?> 
            <tr>
                <td>Tidak dapat data</td>
            </tr>
            <?php } ?>
            <tbody>
            </table>
            </div>
        </div>
<hr>
<small>Didaftarkan oleh: A pada 12/03/2019 <small>
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