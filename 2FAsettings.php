<?php
	require_once("session.php");
	
	require_once("class.user.php");

	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
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
<?php include "adminpage/headeradmin.php"; ?>

<!-- Section: about -->
<section id="login" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Pengesahan Berasaskan Masa (TOTP)</h2>
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
              </div>
            </div>
                <p style="font-style: italic;"><b>Arahan:</b><br/>
                    1. Sila muat turun aplikasi seperti Google Authenticator, Twizo Authenticator atau lain-lain dalam telefon pintar.<br/>
                    2. Imbas Kod QR untuk menyimpan maklumat dalam aplikasi tersebut.<br/>
                    3. Kata laluan satu kali (OTP) akan disiarkan dalam masa 30 saat.<br/>
                    4. Masukkan kata laluan tersebut untuk pengesahan.
                </p>
                <hr/>
                <p>
                <?php require_once( "googleautenticador/gerador.php" ); ?>
                </p>
                <hr/>
                <form action="googleautenticador/verificador.php" method="post" autocomplete="off">
	
                    <input type="text" name="codigo" placeholder="Codigo de Seguranca">

                    <button>Sahkan</button>

                    <input type="hidden" value="<?php echo $codigo_secreto; ?>" name="codigosecreto">

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