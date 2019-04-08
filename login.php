<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
  $user_id = strip_tags($_POST['txt_uid_umail']);
	$user_email = strip_tags($_POST['txt_uid_umail']);
  $user_pass = strip_tags($_POST['txt_upass']);	
    include('connection.php');
    if($user_id != ""){
    $sql = $conn->query("SELECT user_type FROM users 
    WHERE user_id='$user_id'");
  $user_type = $sql->fetchColumn();

  if($login->doLogin($user_id,$user_email,$user_pass,$user_type))
  {
    if($user_type == 'penyelia'){
      $login->redirect('statusmesy.php');
    }

    else if($user_type == 'pengguna') {
      $login->redirect('profil.php');
    }

    else if($user_type == 'admin') {
      $login->redirect('homeA.php');
    }
  }
}
  else
  {
    $error = "ID Staf/Emel atau kata laluan salah !";
  } 
}
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
<?php include "header.php"; ?>

<!-- Section: about -->
<section id="login" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Log Masuk</h2>
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
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
          </div>
          <?php
          }
        ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="vertical-alignment-helper">    
          <div class="text-center">
            <div class="form-top">
              <div class="form-top-center">
                <p>Sila masukkan id staf dan kata laluan:</p>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="" method="post" class="login-form">
                <div class="form-group">
                    <label class="sr-only" for="txt_uid_umail">ID Staf/Emel</label>
                    <input type="text" name="txt_uid_umail" placeholder="ID Staf..." class="form-username form-control" id="txt_uid_umail">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="txt_upass">Kata Laluan</label>
                    <input type="password" name="txt_upass" placeholder="Kata Laluan..." class="form-password form-control" id="txt_upass">
                </div>
                <button type="submit" name="btn-login" class="btn btn-primary btn-block btn-flat">Log Masuk</button>
              </form>
          </div>
        </div>
      </div>
    </div>  
    <br/><hr/>                              
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Daftar Masuk</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="text-center">
        <p>Sila berhubung dengan pentadbiran eJadual</p>               
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