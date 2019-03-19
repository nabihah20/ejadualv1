<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('jadualmesy.php');
}

if(isset($_POST['btn-signup']))
{
  $user_id = strip_tags($_POST['txt_uid']);
	$user_name = strip_tags($_POST['txt_uname']);
	$user_email = strip_tags($_POST['txt_umail']);
	$user_pass = strip_tags($_POST['txt_upass']);	
	
	if($user_id=="")	{
		$error[] = "Sila isi id staf !";	
    }
    else if($user_name=="")	{
		$error[] = "Sila isi nama !";	
	}
	else if($user_email=="")	{
		$error[] = "Sila isi emel !";	
	}
	else if(!filter_var($user_email, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Sila isi alamat emel yang benar !';
	}
	else if($user_pass=="")	{
		$error[] = "Sila isi kata laluan !";
	}
	else if(strlen($user_pass) < 5){
		$error[] = "Kata laluan mesti sekurangnya 5 perkataan";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:user_name OR user_email=:user_email");
			$stmt->execute(array(':user_name'=>$user_name, ':user_email'=>$user_email));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$user_name) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$user_email) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($user_id,$user_name,$user_email,$user_pass)){	
					$user->redirect('register.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
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

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation" style="padding: 1px 0px;">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
            <a href="index.php" class="brand"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
            </div>
          </div>


          <div class="col-md-10">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                                <i class="fa fa-bars"></i>
                                                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php#intro">Home</a></li>
                    <li><a href="index.php#works">Cara Penggunaan</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jadual <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="jadualsu.php">Setiausaha Bandaran</a></li>
                        <li><a href="jadualmesy.php">Mesyuarat</a></li>
                    </ul>
                </li>
              </ul>
            </div>
            <!-- /.Navbar-collapse -->

          </div>
        </div>
      </div>
      <!-- /.container -->
    </nav>
  </div>
  <!-- /Navigation -->

<!-- Section: about -->
<section id="login" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Daftar Masuk</h2>
              <div class="divider-header"></div>
              <?php
                if(isset($error))
                {
                  foreach($error as $error)
                  {
                    ?>
                              <div class="alert alert-danger">
                                  <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                              </div>
                              <?php
                  }
                }
                else if(isset($_GET['joined']))
                {
                  ?>
                          <div class="alert alert-info">
                                <i class="glyphicon glyphicon-log-in"></i> &nbsp; Berjaya didaftarkan <a href='login.php'>Log Masuk</a> di sini
                          </div>
                          <?php
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <div class="form-box">
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3>Penganjur Mesyuarat</h3>
                                                    <p>Sila masukkan id staf,nama,emel dan kata laluan:</p>
                                                </div>
                                            </div>
                                            <div class="form-bottom">
                                                <form role="form" action="" method="post" class="login-form">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_uid">ID Staf</label>
                                                        <input type="text" name="txt_uid" placeholder="ID Staf..." class="form-username form-control" id="txt_uid">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_uname">Nama</label>
                                                        <input type="text" name="txt_uname" placeholder="Nama..." class="form-username form-control" id="txt_uname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_umail">Emel</label>
                                                        <input type="text" name="txt_umail" placeholder="Emel..." class="form-username form-control" id="txt_umail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_upass">Kata Laluan</label>
                                                        <input type="password" name="txt_upass" placeholder="Kata Laluan..." class="form-password form-control" id="txt_upass">
                                                    </div>
                                                    <button type="submit"  name="btn-signup" class="btn btn-primary btn-block btn-flat">Daftar Masuk</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-1 middle-border"></div>
                                    <div class="col-sm-1"></div>
                                        
                                    <div class="col-sm-5">
                                        
                                        <div class="form-box">
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3>Pentadbiran </h3>
                                                    <p>Sila masukkan id staf,nama,emel dan kata laluan:</p>
                                                </div>
                                            </div>
                                            <div class="form-bottom">
                                                <form role="form" action="" method="post" class="login-form">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_uid">ID Staf</label>
                                                        <input type="text" name="txt_uid" placeholder="ID Staf..." class="form-username form-control" id="txt_uid">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_uname">Nama</label>
                                                        <input type="text" name="txt_uname" placeholder="Nama..." class="form-username form-control" id="txt_uname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_umail">Emel</label>
                                                        <input type="text" name="txt_umail" placeholder="Emel..." class="form-username form-control" id="txt_umail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="txt_upass">Kata Laluan</label>
                                                        <input type="password" name="txt_upass" placeholder="Kata Laluan..." class="form-password form-control" id="txt_upass">
                                                    </div>
                                                    <button type="submit"  name="btn-signup" class="btn btn-primary btn-block btn-flat">Daftar Masuk</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
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