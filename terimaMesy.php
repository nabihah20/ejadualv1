<?php

/**
  * Terima surat jemputan mesy
  */

require_once('connection.php');

if (isset($_GET['ID'],$_GET['ahli_id'])) {
    try {
        $ID = $_GET['ID'];
        $ahli_id = $_GET['ahli_id'];
        $result=$conn->prepare("UPDATE mesy_ahli 
                                SET ahli_status='6' 
                                WHERE ahli_id='$ahli_id'
                                AND mesy_id = '$ID'");
        $result->execute($mesy);
        $success = "Terima kasih telah mengesahkan kehadiran anda";
    } catch(PDOException $error) {
        echo $ahli_id;
    }
  }
?>

<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "header.php"; ?>

<!-- Section: about -->
<section id="profil" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold"><?php if ($success) echo $success; ?></h2>
              <div class="divider-header"></div>
              <h5> Status kehadiran anda sekarang ialah 'Terima'. <br/> 
              Sila hubungi pihak pentadbiran jika berlaku kesilapan. </h5>
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

