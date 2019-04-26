<?php
	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

//1
if(isset($_POST['btn-reset'])){
    include('connection.php');
    $fp_code = '';

    //2
    if(!empty($_POST['txt_upass']) && !empty($_POST['confirm_txt_upass']) && !empty($_POST['fp_code'])){
      $fp_code = $_POST['fp_code'];

        //password and confirm password comparison
        //3
        if($_POST['txt_upass'] !== $_POST['confirm_txt_upass']){
            $error = "Kata laluan tidak sama";
        }else{
            //4  
            try {
                $users =[
                  "fp_code"   =>$_POST['fp_code']
                ];

                $stmt = $conn->prepare("SELECT user_pass 
                                        FROM users
                                        WHERE user_pass=:fp_code");
                $stmt->bindParam(":user_pass", $fp_code);
                $stmt->execute($users);

                    //5
                    if($stmt->rowCount() > 0)
                    {
                      $stmt = $conn->prepare("SELECT * 
                                        FROM users
                                        WHERE user_pass=:fp_code");
                      $stmt->execute($users);    
                      $userPassRow=$stmt->fetch(); 
                      $id = $userPassRow['id'];

                      $user_pass = $_POST['txt_upass'];
                      $user_pass_new = password_hash($user_pass, PASSWORD_DEFAULT);

                      $stmt = $conn->prepare("UPDATE users
                      SET user_pass=:user_pass
                      WHERE id='$id'");
                      $stmt->bindparam(":user_pass", $user_pass_new);	
                      $stmt->execute();
                      header('Location: resetOtherPassword.php?success');

                    } else {
                        $error = "Kata laluan yang baru tidak berjaya didaftarkan";
                    }
                    //5

                } catch(PDOException $error) {
                    echo $user_pass_new;
                } 
                //4 
        }
        //3             
    }else{
        $error = "Kod menetapkan semula kata laluan tidak sama";
    }
    //2
}//1
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <title>eJadual - Sistem Penjadualan Mesyuarat </title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/animations.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Bocor
    Theme URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <style>
        .vertical-alignment-helper {
        display:table;
        height: 100%;
        width: 100%;
        padding: 20px;
      }
    </style>
</head>

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
<section id="login" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Tukar Kata Laluan</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div id="error">
        <?php
          if(isset($error))
          {
        ?>
          <div class="alert alert-danger">
            <i class="glyphicon glyphicon-warning"></i> &nbsp; <?php echo $error; ?> !
          </div>
          <?php
          } else if(isset($_GET['success'])) {
        ?>
            <div class="alert alert-info">
                <i class="glyphicon glyphicon-log-in"></i> &nbsp; Kata laluan berjaya ditukarkan
            </div>
          <?php  } ?>
        
    </div>
    <div class="container">
      <div class="row">
        <div class="vertical-alignment-helper">    
          <div class="text-center">
            <div class="form-top">
              <div class="form-top-center">
                <p>Sila masukkan kata laluan yang baru:</p>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="" method="post" class="login-form">
                <div class="form-group">
                    <div class="form-group col-md-3">
                        <label for="txt_upass">Kata Laluan Baru</label>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="password" name="txt_upass" placeholder="Kata Laluan" class="form-password form-control" id="txt_upass">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group col-md-3">
                        <label for="txt_upass">Sahkan Kata Laluan</label>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                        <input type="password" name="confirm_txt_upass" placeholder="Sahkan Kata Laluan" class="form-password form-control" id="confirm_txt_upass">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12" style="text-align:center;">
                        <button type="submit" id="btn-reset" name="btn-reset" class="btn btn-primary btn-block btn-flat">Teruskan</button>
                    </div>
                </div>
             </form>
            </div>
          </div> 
        </div>
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