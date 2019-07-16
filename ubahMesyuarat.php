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

//ID Bilik 
if (isset($_POST['btnUbahKod'])) {
    try {
        include('connection.php');
        $mesyuarat =[
        "mesy_kod"         =>$_POST['mesy_kod']
      ];
  
      $sql = "UPDATE mesyuarat
              SET 
              mesy_kod=:mesy_kod
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($mesyuarat);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Nama 
if (isset($_POST['btnUbahNama'])) {
    try {
        include('connection.php');
        $mesyuarat =[
        "mesy_nama"         =>$_POST['mesy_nama']
      ];
  
      $sql = "UPDATE mesyuarat
              SET 
              mesy_nama=:mesy_nama
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($mesyuarat);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
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
    <div class="col-md-10 col-sm-12 col-xs-12"><!-- Start Col 1 -->
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $mesyuaratRow['id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Kod Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_kod" name="mesy_kod" class="form-control" value="<?php echo $mesyuaratRow['mesy_kod'];?>">
            </div>  
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahKod" name="btnUbahKod" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH kod mesyuarat ?');" >Ubah</button>
            </div> 
        </form>                   
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Nama Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_nama" name="mesy_nama" class="form-control" value="<?php echo $mesyuaratRow['mesy_nama']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahNama" name="btnUbahNama" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH nama ?');" >Ubah</button>
            </div> 
        </form>     
        </div>
        </div> <!-- End Col 1 -->
        <div class="col-md-2 col-sm-* col-xs-*"> <!-- Start Col 2 -->
            <div class="row">
            <blockquote>
                <h6><b>Arahan :</b><br/> 1. Sila tekan 'ubah' untuk mengubah data yang ada. <br/><br/>
                </h6>
            </blockquote>
            </div>
        </div> <!-- End Col 2 -->
        </div>
  </section>
  <!-- /Section: about -->

  <?php include "footer.php"; ?>

</body>
</html>