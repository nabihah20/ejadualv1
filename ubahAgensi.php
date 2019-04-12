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

//ID Agensi 
if (isset($_POST['btnUbahID'])) {
    try {
        include('connection.php');
        $agensi =[
        "agensi_id"         =>$_POST['agensi_id']
      ];
  
      $sql = "UPDATE agensi
              SET 
              agensi_id=:agensi_id
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($agensi);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Nama 
if (isset($_POST['btnUbahNama'])) {
    try {
        include('connection.php');
        $agensi =[
        "agensi_nama"         =>$_POST['agensi_nama']
      ];
  
      $sql = "UPDATE agensi
              SET 
              agensi_nama=:agensi_nama
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($agensi);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Emel
if (isset($_POST['btnUbahEmel'])) {
    try {
        include('connection.php');
        $agensi =[

        "agensi_emel"  =>$_POST['agensi_emel']

      ];
  
      $sql = "UPDATE agensi
              SET 
              agensi_emel=:agensi_emel
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($agensi);
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
  if($user_type == 'admin'){
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
    <div class="col-md-10 col-sm-12 col-xs-12"><!-- Start Col 1 -->
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $agensiRow['id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>ID Agensi:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="agensi_id" name="agensi_id" class="form-control" value="<?php echo $agensiRow['agensi_id'];?>">
            </div>    
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahID" name="btnUbahID" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH id agensi ?');" >Ubah</button>
            </div> 
        </form>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Nama Agensi:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="agensi_nama" name="agensi_nama" class="form-control" value="<?php echo $agensiRow['agensi_nama']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahNama" name="btnUbahNama" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH nama ?');" >Ubah</button>
            </div> 
        </form>     
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Emel:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="agensi_emel" name="agensi_emel" class="form-control" value="<?php echo $agensiRow['agensi_emel']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahEmel" name="btnUbahEmel" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH emel ?');" >Ubah
            </button>
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