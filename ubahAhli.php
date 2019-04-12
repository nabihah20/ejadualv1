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
        $sql = "SELECT * FROM ahli 
        WHERE id='$ID'";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":id"=>$ID));
        $ahliRow=$statement->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
  echo "Ada kesilapan dalam sambungan ke pengkalan data";
  exit;
}

//ID Ahli
if (isset($_POST['btnUbahID'])) {
    try {
        include('connection.php');
        $ahli =[
        "ahli_id"         =>$_POST['ahli_id']
      ];
  
      $sql = "UPDATE ahli
              SET 
              ahli_id=:ahli_id
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($ahli);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Nama 
if (isset($_POST['btnUbahNama'])) {
    try {
        include('connection.php');
        $ahli =[
        "ahli_nama"         =>$_POST['ahli_nama']
      ];
  
      $sql = "UPDATE ahli
              SET 
              ahli_nama=:ahli_nama
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($ahli);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Emel
if (isset($_POST['btnUbahEmel'])) {
    try {
        include('connection.php');
        $ahli =[

        "ahli_emel"  =>$_POST['ahli_emel']

      ];
  
      $sql = "UPDATE ahli
              SET 
              ahli_emel=:ahli_emel
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($ahli);
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
              <h2 class="h-bold">Maklumat Ahli Mesyuarat</h2>
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
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $ahliRow['id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>ID Agensi:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="ahli_id" name="ahli_id" class="form-control" value="<?php echo $ahliRow['ahli_id'];?>">
            </div>    
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahID" name="btnUbahID" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH id ahli ?');" >Ubah</button>
            </div> 
        </form>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Nama Ahli:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="ahli_nama" name="ahli_nama" class="form-control" value="<?php echo $ahliRow['ahli_nama']; ?>">
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
            <input type="text" id="ahli_emel" name="ahli_emel" class="form-control" value="<?php echo $ahliRow['ahli_emel']; ?>">
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