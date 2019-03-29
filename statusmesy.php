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
<?php include "headerhome.php"; ?>

<!-- Section: about -->
<section id="profil" class="home-section color-dark bg-white">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="animatedParent">
            <div class="section-heading text-center animated bounceInDown">
              <h2 class="h-bold">Status Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>


  <!--Main container. Everything must be contained within a top-level container.-->
  <div class="container">

    <!--First row (only row)-->
    <div class="row">

      <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
      <div class="col-md-4 col-sm-12 col-xs-12">

          <!-- Div to center the header image/name/social buttons -->
          <div class="text-center">

              <!-- Placeholder image using Placeholder.com -->
              <img src="http://via.placeholder.com/300x250" class="img-rounded"/>

              <!-- Header text (Person's name) -->
              <h4><?php echo $userRow['user_name']; ?></h4>
              
              <!-- Social buttons using anchor elements and btn-primary class to style -->
              <div class="text-left">
              <table class="table table-hover table-dark">
                <tr>
                  <th>ID Staf</th>
                  <td>: <?php echo $userRow['user_id'];?></td>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td>: <?php echo $userRow['user_name']; ?></td>
                </tr>
                <tr>
                  <th>Emel</th>
                  <td>: <?php echo $userRow['user_email']; ?></td>
                </tr>
                <tr>
                  <th>Jenis Pengguna</th>
                  <td>: <?php echo $userRow['user_type']; ?></td>
                </tr>
            </table>  
            </div>                
          </div>

      </div> <!-- End Col 1 -->

      <!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
      <div class="col-md-8 col-sm-* col-xs-*">

        <!-- "Lead" text at top of column. -->
        <p class="lead">Status Mesyuarat yang didaftarkan</p>

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />

        <table class="table table-hover table-dark">
          <?php
            include('connection.php');
              $sql = "SELECT * FROM mesy";
              $statement = $conn->prepare($sql);
              $statement->execute();
              $result = $statement->fetchAll();
              
             if ($result && $statement->rowCount() > 0) {
          ?>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tarikh</th>
                  <th scope="col">Masa</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
            <?php
              $counter = 1; 
              foreach ($result as $row) {
                  
                  $title = $row['title'];
                  $mesy_tarikh = $row['mesy_tarikh'];
                  $start = $row['start'];
                  $mesy_lokasi = $row['mesy_lokasi'];
                  $mesy_status = $row['mesy_status'];
            ?>

            <tbody>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $mesy_tarikh; ?></td>
                <td><?php echo $start; ?></td>
                <td><?php echo $mesy_lokasi; ?></td>
                <td><?php echo $mesy_status; ?></td>
              </tr>
            <?php $counter++; 
        }

    } else {
        ?> 
        <tr>
            <td>Tiada mesyuarat didaftarkan lagi</td>
        </tr>
<?php
    }
?>
          </tbody>
        </table>	

      </div> <!-- End column 2 -->

    </div> <!-- End row 1 -->

  </div> <!-- End main container -->

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