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
        $sql = "SELECT * FROM mesyuarat 
        WHERE id='$ID'";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":id"=>$ID));
        $mesyuaratRow=$statement->fetch(PDO::FETCH_ASSOC);

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
        </div>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID:</label>
            </div>
            <div class="form-group col-md-8">
            <?php echo $mesyuaratRow['id'];?>
            </div>                    
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Kod Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $mesy_kod = $mesyuaratRow['mesy_kod'];
            echo $mesy_kod ;?>
            </div>                    
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Nama Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $mesy_nama = $mesyuaratRow['mesy_nama'];
            echo $mesy_nama; ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Ahli Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
                <table>
                <?php
                if ($mesyuaratRow && $statement->rowCount() > 0) { 

                    $counter = 1; 
                    
                    $keywords = explode( ",", $mesyuaratRow['mesyuarat_ahli'] );
                    foreach ($keywords as $keyword) {

                      $sql = $conn->query("SELECT ahli_nama FROM ahli
                      WHERE ahli_id='$keyword'");
                      $keyword_new=$sql->fetchColumn();

                ?>
                    <tr>
                        <td><?php echo $counter; ?>. <?php echo $keyword_new; ?> [<?php echo $keyword; ?>] </td>
                    </tr>
                    <?php $counter++;

                    }
                    } else {
                        ?> 
                    <tr>
                        <td>Tiada agensi yang didaftarkan lagi</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12" style="text-align:right;">
            <?php 
            echo '<a href="ubahMesyuarat.php?ID='.$ID.'" class="btn btn-info" role="button" onClick="return confirm(\'Anda pasti untuk UBAH '.$mesy_nama.' ?\');">
            Ubah</a>'; ?> &emsp;
            <?php echo '<a href="padamMesyuarat.php?ID='.$ID.'" class="btn btn-danger" role="button" onClick="return confirm(\'Anda pasti untuk PADAM '.$mesy_nama.' ?\');">
            Padam</a>'; ?>
            </div>
        </div>
        </div>
  </section>
  <!-- /Section: about -->

  <?php include "footer.php"; ?>

</body>
</html>