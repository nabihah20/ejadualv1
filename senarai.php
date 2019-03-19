<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php include "header.php"; ?>

<!-- Section: about -->
<section id="bilik" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Senarai Lokasi Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-dark">
          <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            </tr>
          </thead>
          <tbody>
            <?php
                require_once('connection.php');
                $result = $conn->prepare("SELECT * FROM bilik");
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
            ?>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['bilik_id']; ?></td>
              <td><?php echo $row['bilik_nama']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>			
      </div>                      
    </div>
  </section>
  <!-- /Section: about -->
  <!-- Section: about -->
<section id="jab" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Senarai Jabatan</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-dark">
          <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            </tr>
          </thead>
          <tbody>
          <?php
            require_once('connection.php');
            $result = $conn->prepare("SELECT * FROM jab");
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
          ?>
            <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['jab_id']; ?></td>
            <td><?php echo $row['jab_nama']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>			
      </div>                     
    </div>
  </section>
  <!-- /Section: about -->
  <!-- Section: about -->
<section id="agensi" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Senarai Agensi</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-dark">
          <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            </tr>
          </thead>
          <tbody>
          <?php
            require_once('connection.php');
            $result = $conn->prepare("SELECT * FROM agensi");
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
          ?>
            <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['agensi_id']; ?></td>
            <td><?php echo $row['agensi_nama']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>			
      </div>                      
    </div>
  </section>
  <!-- /Section: about -->

  <!-- Section: about -->
  <section id="ahli" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center">
              <h2 class="h-bold">Senarai Ahli Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <table class="table table-hover table-dark">
          <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            </tr>
          </thead>
          <tbody>
          <?php
            require_once('connection.php');
            $result = $conn->prepare("SELECT * FROM ahli");
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
          ?>
            <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['ahli_id']; ?></td>
            <td><?php echo $row['ahli_nama']; ?></td>
            </tr>
          <?php } ?>
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