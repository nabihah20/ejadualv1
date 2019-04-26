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
        $sql = "SELECT * FROM agensi 
        WHERE id='$ID'";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":id"=>$ID));
        $agensiRow=$statement->fetch(PDO::FETCH_ASSOC);

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
              <h2 class="h-bold">Maklumat Agensi</h2>
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
            <div class="form-group col-md-8">
            <?php echo $agensiRow['id'];?>
            </div>                    
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID Agensi:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $agensi_id = $agensiRow['agensi_id'];
            echo $agensi_id ;?>
            </div>                    
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Nama Agensi:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $agensi_nama = $agensiRow['agensi_nama'];
            echo $agensi_nama; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Emel:</label>
            </div>
            <div class="form-group col-md-8">
            <?php echo $agensiRow['agensi_emel']; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12" style="text-align:right;">
            <?php 
            echo '<a href="ubahAgensi.php?ID='.$ID.'" class="btn btn-info" role="button" onClick="return confirm(\'Anda pasti untuk UBAH '.$agensi_id.' ?\');">
            Ubah</a>'; ?> &emsp;
            <?php echo '<a href="padamaAgensi.php?ID='.$ID.'" class="btn btn-danger" role="button" onClick="return confirm(\'Anda pasti untuk PADAM '.$agensi_id.' ?\');">
            Padam</a>'; ?>
            </div>
        </div>
        </div>
  </section>
  <!-- /Section: about -->

  <?php include "footer.php"; ?>

</body>
</html>