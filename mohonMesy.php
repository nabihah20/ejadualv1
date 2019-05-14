<?php 
	require_once("session.php");
	
	require_once("class.user.php");

	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['btnMohonMesy'])) {
  try {
      include('connection.php');

        $bil =$_POST['bil'];
        $title =$_POST['title'];
        $mesy_huraian =$_POST['mesy_huraian'];
        $start =$_POST['txtMasaMula'];
        $end =$_POST['txtMasaTamat'];
        
        //from <select>
        $jab_id =$_POST['jab_id'];
        $mesy_lokasi =$_POST['mesy_lokasi'];
        $mesy_tarikh =$_POST['txtTarikh'];
        $mtarikh = strtotime ($mesy_tarikh);
        $mtarikh = date ("Y/m/d", $mtarikh);
        $startnew = date('Y-m-d H:i:s', strtotime("$mtarikh $start"));
        $endnew = date('Y-m-d H:i:s', strtotime("$mtarikh $end"));

        //from hidden
        $color =$_POST['color'];
        $textColor =$_POST['textColor'];
        $mesy_status =$_POST['status'];
        $user_id =$_POST['user_id'];

        $sql = $conn->query("SELECT DATE_FORMAT('$mtarikh', '%m')");
        $mesy_bulan=$sql->fetchColumn(); 

        $sql = "INSERT INTO mesy(title,bil,mesy_huraian,
        color,textColor,start,end,jab_id,mesy_pengerusi,
        mesy_lokasi,mesy_tarikh,mesy_bulan,mesy_status,user_id)
        VALUES('$title','$bil','$mesy_huraian','$color','$textColor','$startnew',
        '$endnew','$jab_id','$mesy_pengerusi','$mesy_lokasi',
        '$mtarikh','$mesy_bulan','$mesy_status','$user_id')";

        $statement = $conn->prepare($sql);
        $statement->execute();

        //require_once('connection.php');
        //$searchID = $conn->prepare("SELECT max(mesy_id) FROM mesy");
        //$searchID ->execute();
        //$mesy_id_current = $searchID ->fetchColumn();
        //$mesy_ahli=$_POST['mesy_ahli'];
        //foreach ($mesy_ahli as $mesy_ahlir) {
            //$result1 = $conn->prepare("INSERT INTO mesy_ahli(mesy_id, ahli_id)
            //VALUES('$mesy_id_current',:mesy_ahli)");
            //$result1->bindParam(":mesy_ahli", $mesy_ahlir);
            //$result1->execute();
        //}

        //$agensi_id=$_POST['agensi_id'];
        //foreach ($agensi_id as $agensi_idr) {
            //$result2 = $conn->prepare("INSERT INTO mesy_agensi(mesy_id, agensi_id)
            //VALUES('$mesy_id_current',:agensi_id)");
            //$result2->bindParam(":agensi_id", $agensi_idr);
            //$result2->execute();
        //}
        $success = "Mesyuarat berjaya dimohon";

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
              <h2 class="h-bold"><?php if ($success) echo $success; ?></h2>
              <div class="divider-header"></div>
              <h5> Status mesyuarat sekarang ialah 'Baru'. <br/> 
              Maklumat mesyuarat yang baru akan disemak oleh Pegawai Penyelaras Bilik sebelum diluluskan. </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="text-align:center;">
        <div class="row">

        <img id="imgdone" src="img/done.gif" alt="Proses berjaya!">
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

  <!-- setTimeout after 2 seconds -->
  <script type="text/javascript">
    setTimeout(function() {
        setInterval(function() {
            $('#imgdone').attr('src',$('#imgdone').attr('src'))
        },1)
    }, 2000)
</script>

</body>
</html>