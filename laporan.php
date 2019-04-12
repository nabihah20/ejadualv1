<?php 
	require_once("session.php");
	
	require_once("class.user.php");

	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "adminpage/headeradmin.php"; ?>

<!-- Section: about -->
<section id="profil" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Laporan</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />
        <table class="table table-hover table-dark">
          <?php
            include('connection.php');
            
                //Pengguna
                $sql = $conn->query("SELECT COUNT(*) FROM users");
                $count_pengguna=$sql->fetchColumn();
                //Penyelia Bilik
                $sql = $conn->query("SELECT COUNT(*) FROM users
                    WHERE user_type='penyelia'");
                $count_penyelia=$sql->fetchColumn();
                //Bilik
                $sql = $conn->query("SELECT COUNT(*) FROM bilik");
                $count_bilik=$sql->fetchColumn();
                //Agensi
                $sql = $conn->query("SELECT COUNT(*) FROM agensi");
                $count_agensi=$sql->fetchColumn();
                //Ahli Mesyuarat
                $sql = $conn->query("SELECT COUNT(*) FROM ahli");
                $count_ahli=$sql->fetchColumn();
                //Mesyuarat
                $sql = $conn->query("SELECT COUNT(*) FROM mesy");
                $count_mesy=$sql->fetchColumn();
              
          ?>
            <thead>
            <tr>
                <th>Perkara</th>
                <th>Jumlah Didaftarkan</th>
            </tr>
            </thead>
            <tbody> 
            <tr>
                <th>Pengguna</th>
                <td><?php echo '<a href="addUser.php">'.$count_pengguna.'</a>'; ?></td>
            </tr>
            <tr>
                <th>Penyelia Bilik</th>
                <td><?php echo '<a href="addPenyelia.php">'.$count_penyelia.'</a>'; ?></td>
            </tr>
            <tr>
                <th>Bilik</th>
                <td><?php echo '<a href="addBilik.php">'.$count_bilik.'</a>'; ?></td>
            </tr>
            <tr>
                <th>Agensi</th>
                <td><?php echo '<a href="addAgensi.php">'.$count_agensi.'</a>'; ?></td>
            </tr>
            <tr>
                <th>Ahli Mesyuarat</th>
                <td><?php echo '<a href="addAhli.php">'.$count_ahli.'</a>'; ?></td>
            </tr>
            <tr>
                <th>Mesyuarat</th>
                <td><?php echo '<a href="addMesy.php">'.$count_mesy.'</a>'; ?></td>
            </tr>
            </tbody>
        </table>	

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