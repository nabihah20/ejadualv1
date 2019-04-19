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
        $sql = "SELECT * FROM users 
        WHERE id='$ID'";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":id"=>$ID));
        $penggunaRow=$statement->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
  echo "Ada kesilapan dalam sambungan ke pengkalan data";
  exit;
}

//Nama 
if (isset($_POST['btnUbahNama'])) {
    try {
        include('connection.php');
        $users =[
        "user_name"         =>$_POST['user_name']
      ];
  
      $sql = "UPDATE users
              SET 
              user_name=:user_name
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($users);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Emel
if (isset($_POST['btnUbahEmel'])) {
    try {
        include('connection.php');
        $users =[

        "user_email"  =>$_POST['user_email']

      ];
  
      $sql = "UPDATE users
              SET 
                user_email=:user_email
                WHERE id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($users);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Kata Laluan
if (isset($_POST['btnUbahPass'])) {
    try {
        include('connection.php');
        $pass   =$_POST['user_pass'];
  
    header('Location: resetOtherPassword.php?fp_code='.$pass.'');

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
              <h2 class="h-bold">Maklumat Pengguna</h2>
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
            <input type="text" id="id" name="id" class="form-control" value="<?php echo $penggunaRow['id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID Pengguna:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="user_id" name="user_id" class="form-control" value="<?php echo $penggunaRow['user_id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Nama Pengguna:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="user_name" name="user_name" class="form-control" value="<?php echo $penggunaRow['user_name']; ?>">
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
            <input type="text" id="user_email" name="user_email" class="form-control" value="<?php echo $penggunaRow['user_email']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahEmel" name="btnUbahEmel" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH emel ?');" >Ubah
            </button>
            </div>  
        </form>  
        </div>
        <div class="row">
        <hr/>
        <form method="post">
            <div class="form-group col-md-2">
            <label>Kata Laluan:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="password" id="user_pass" class="form-control" name="user_pass" value="<?php echo $penggunaRow['user_pass']; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahPass" name="btnUbahPass" class="btn btn-info" onClick="return confirm('Anda pasti untuk UBAH kata laluan ?');">
            <span class="glyphicon glyphicon-lock"></span>
            </button>
            </div>  
        </form>  
        </div>
        </div> <!-- End Col 1 -->
        <div class="col-md-2 col-sm-* col-xs-*"> <!-- Start Col 2 -->
            <div class="row">
            <blockquote>
                <h6><b>Arahan :</b><br/> 1. Sila tekan 'ubah' untuk mengubah data yang ada. <br/><br/>
                 2. Sila tekan 
                 <?php
                echo '<a href="ubahUser.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk UBAH '.$user_id.' ?\');">
                <span class="glyphicon glyphicon-lock"></span>
                </a>'; 
                ?> <br/> untuk mengubah <br/>kata laluan.<br/><br/>
                Anda perlu masukkan kata laluan menggunakan pengesahan dua faktor.<br/>
                <small><a href="" >Apa itu Pengesahan Dua Faktor?</a></small>
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