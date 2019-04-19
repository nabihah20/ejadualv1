<?php
session_start();
require_once("class.user.php");
$login = new USER();

if(isset($_POST['btn-forgot'])){
    //check whether email is empty
    if(!empty($_POST['user_email'])){
        //check whether user exists in the database
            include('connection.php');
            $user_email =   $_POST['user_email'];  
            try {
                $stmt = $conn->prepare("SELECT user_email 
                                        FROM users
                                        WHERE user_email=:user_email");
                $stmt->bindParam(":user_email", $user_email);
                $stmt->execute();

                    if($stmt->rowCount() > 0)
                    {
                        $stmt = $conn->prepare("SELECT *
                        FROM users
                        WHERE user_email='$user_email'");
                        $stmt->execute(array(":user_email"=>$user_email));
                        $userForgetRow=$stmt->fetch(PDO::FETCH_ASSOC);
                        $password = $userForgetRow['user_pass'];
                        header('Location: emelTetapanResetPass.php?email='.$user_email.'&pass='.$password.'');
                    } else {
                        $error = "Emel yang diberi tidak didaftarkan";
                    }

                } catch(PDOException $error) {
                    echo $user_email;
                }               
    }else{
        $error = "Masukkan emel yang benar";
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
              <h2 class="h-bold">Lupa Kata Laluan</h2>
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
          }
        ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="vertical-alignment-helper">    
          <div class="text-center">
            <div class="form-top">
              <div class="form-top-center">
                <p>Sila masukkan emel untuk menetapkan semula kata laluan yang baru:</p>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="" method="post" class="login-form">
                <div class="form-group">
                    <div class="form-group col-md-2">
                        <label>ID Staf/Emel</label>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Masukkan emel">
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" id="btn-forgot" name="btn-forgot" class="btn btn-primary btn-block btn-flat">Teruskan</button>
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