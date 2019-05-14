<?php
	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['ID'])) {
    try{
        include('connection.php');
        $ID = $_GET['ID'];
        $sql = "SELECT * FROM mesy 
        WHERE mesy_id='$ID'";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":mesy_id"=>$ID));
        $mesyRow=$statement->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
  echo "Ada kesilapan dalam sambungan ke pengkalan data";
  exit;
}



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
          <?php if(isset($_GET['berjaya']))
            {
                ?>
                        <div class="alert alert-info">
                              <i class="glyphicon glyphicon-ok"></i> &nbsp; Mesyuarat berjaya ditunda.<br/>
                              Status mesyuarat sekarang ialah Tunda.<br/>
                              Sila hubungi pihak pentadbiran jika berlaku kesilapan.
                        </div>
                        <?php
              }
              ?>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="col-md-10 col-sm-12 col-xs-12"><!-- Start Col 1 -->
    <form action="mohonMesy.php" method="post">
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_id" name="mesy_id" class="form-control" value="<?php echo $mesyRow['mesy_id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Nama Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
            <?php $title = $mesyRow['title']; ?>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo $title; ?>" readonly>
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Bil:</label>
            </div>
            <div class="form-group col-md-8">
            <?php $bil = $mesyRow['bil'];?>
            <input type="text" id="bil" name="bil" class="form-control" value="<?php echo $bil; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Huraian:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_huraian" name="mesy_huraian" class="form-control" value="<?php echo $mesyRow['mesy_huraian']; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Tarikh:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $mesy_tarikh = $mesyRow['mesy_tarikh'];
            ?>
            <input type="text" id="txtTarikh" class="form-control" name="txtTarikh" value="<?php echo $mesy_tarikh; ?>" >
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Masa:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $start=$mesyRow['start'];
            
            $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
            WHERE mesy_id='$ID'");
            $start_new=$sql->fetchColumn();
            ?>
                <div class="form-group col-md-3">
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input type="text" id="txtMasaMula" name="txtMasaMula" class="form-control" value="<?php echo $start_new; ?>" >
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label> sehingga </label>
                </div>
            <?php
            $end=$mesyRow['end'];
            
            $sql = $conn->query("SELECT TIME_FORMAT('$end', '%h:%i %p') FROM mesy
            WHERE mesy_id='$ID'");
            $end_new=$sql->fetchColumn();
            ?>
                <div class="form-group col-md-3">
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input type="text" id="txtMasaTamat" name="txtMasaTamat" class="form-control" value="<?php echo $end_new; ?>" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Lokasi:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $mesy_lokasi = $mesyRow['mesy_lokasi'];
            $sql = $conn->query("SELECT bilik_nama FROM bilik
            WHERE bilik_id='$mesy_lokasi'");
            $bilik_nama=$sql->fetchColumn();
            ?>
            <input type="text" id="mesy_lokasinama" name="mesy_lokasinama" class="form-control" value="<?php echo $bilik_nama; ?>" readonly>
            <input type="hidden" id="mesy_lokasi" name="mesy_lokasi" class="form-control" value="<?php echo $mesy_lokasi; ?>" readonly>
            </div>
        </div> 
        <div class="row">
            <div class="form-group col-md-2">
            <label>Urusetia:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $jab_id = $mesyRow['jab_id'];
            $sql = $conn->query("SELECT jab_nama FROM jab
            WHERE jab_id='$jab_id'");
            $jab_nama=$sql->fetchColumn();
            ?>
            <input type="text" id="jab_idnama" name="jab_idnama" class="form-control" value="<?php echo $jab_nama; ?>" readonly>
            <input type="hidden" id="jab_id" name="jab_id" class="form-control" value="<?php echo $jab_id; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Pengerusi:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_pengerusi" name="mesy_pengerusi" class="form-control" value="<?php echo $mesyRow['mesy_pengerusi']; ?>" readonly>
            </div>
        </div>  
        <div class="row">
            <div class="form-group col-md-2">
            <label>Ahli Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
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

                    <input type="hidden" id="ahli_idh" name="ahli_idh" class="form-control" value="<?php echo $ahli_id; ?>">
                    <?php 
                    $sql = $conn->query("SELECT ahli_emel FROM ahli
                    WHERE ahli_id='$ahli_id'");
                    $ahli_id_emel=$sql->fetchColumn();
                    ?>
                    <input type="hidden" id="ahli_ide" name="ahli_ide" class="form-control" value="<?php echo $ahli_id_emel; ?>">
                    <input type="text" id="ahli_id" name="ahli_id" class="form-control" value="<?php echo $counter; ?>. <?php echo $ahli_id_new; ?>" readonly>
                    <br/>
                <?php $counter++; 
                 } 
                } else {
                ?> 
                Tiada ahli mesyuarat yang didaftarkan lagi
            <?php
                } ?> 
                </div>
                <?php } else {
                ?> 
            Tidak dapat data
            <?php } ?>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Agensi:</label>
            </div>
            <div class="form-group col-md-8">
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

                    <input type="hidden" id="agensi_idh" name="agensi_idh" class="form-control" value="<?php echo $agensi_id; ?>">
                    <input type="text" id="agensi_id" name="agensi_id" class="form-control" value="<?php echo $counter; ?>. <?php echo $agensi_id_new; ?>" readonly>  
                    <br/>
                <?php $counter++;
                }
                } else {
                    ?> 
                    Tiada agensi yang didaftarkan lagi
            <?php
                }
            } else {
                ?> 
                Tidak dapat data
            <?php } ?>
            <tbody>
            </table>
            </div>
        </div>
        <!-- Hidden data -->
        <input type="hidden" id="color" name="color" class="form-control" value="#ffeb3b">
        <input type="hidden" id="textColor" name="textColor" class="form-control" value="#000">
        <input type="hidden" id="status" name="status" class="form-control" value="1">
        <input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $mesyRow['user_id']; ?>">
        <div class="row">
            <div class="form-group col-md-12" style="text-align:center;">
                <button type="submit" id="btnMohonMesy" name="btnMohonMesy" class="btn btn-primary" onClick="return confirm('Anda pasti untuk mohon <?php echo $title; ?> dengan tarikh dan/atau masa yang baru?');" >MOHON</button>
            </div>
        </div>
        </form>
        </div> <!-- End Col 1 -->
        <div class="col-md-2 col-sm-* col-xs-*"> <!-- Start Col 2 -->
            <div class="row">
            <blockquote>
                <h6><b>Arahan :</b><br/> 1. Sila tekan 'mohon' untuk memohon mesyuarat. <br/><br/>
            </blockquote>
            </div>
        </div> <!-- End Col 2 -->
        </div>
  </section>
  <!-- /Section: about -->

  <?php include "footer.php"; ?>
  <script type="text/javascript">
    $(function(){
      $("#txtTarikh").datepicker();
    });
  </script>
</body>
</html>