<?php 
	require_once("session.php");
	
	require_once("class.user.php");

	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

//Tambah bilik 
if (isset($_POST['btnAddMesyuarat'])) {
  try {
      include('connection.php');
      $mesyuarat =[
      "mesy_kod"                 =>$_POST['mesy_kod'],
      "mesy_nama"                =>$_POST['mesy_nama']

    ];

    $sql = "INSERT INTO mesyuarat(mesy_kod,mesy_nama)
            VALUES(:mesy_kod,:mesy_nama)";

  $statement = $conn->prepare($sql);
  $statement->execute($mesyuarat);
  header("Refresh:0");
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
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
              <h2 class="h-bold">Maklumat Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="paging">

        <!-- "Lead" text at top of column. -->
        <p class="lead">Senarai Mesyuarat yang didaftarkan</p>
        <div class="row">
            <div class="form-group col-md-12" style="text-align:right;">
            <!-- Trigger the modal with a button -->
            <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalMesyuarat"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
        </div>

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />
        <table class="table table-hover table-dark">
          <?php
            $page = @$_GET['page'];
  
            if($page == 0 || $page == 1){
              $page1 = 0;	
            }
            else {
              $page1 = ($page * 10) - 10;	
            }
            include('connection.php');
              $sql = "SELECT * FROM mesyuarat
              LIMIT $page1, 10";
              $statement = $conn->prepare($sql);
              $statement->execute();
              $result = $statement->fetchAll();
              
             if ($result && $statement->rowCount() > 0) {
          ?>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kod Mesyuarat</th>
                  <th scope="col">Nama</th>
                </tr>
              </thead>
            <?php
              $counter = 1; 
              foreach ($result as $row) {
                  $id = $row['id'];
                  $mesy_kod = $row['mesy_kod'];
                  $mesy_nama = $row['mesy_nama'];
            ?>

            <tbody>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo '<a href="lihatMesyuarat.php?ID='.$id.'">'.$mesy_kod.'</a>'; ?></td>
                <td><?php echo $mesy_nama; ?></td>
                <td>
                <?php 
                echo '<a href="padamMesyuarat.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk PADAM '.$mesy_nama.' ?\');">
                <span class="glyphicon glyphicon-trash"></span>
                </a>'; ?> &emsp;
                <?php
                echo '<a href="ubahMesyuarat.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk UBAH '.$mesy_nama.' ?\');">
                <span class="glyphicon glyphicon-pencil"></span>
                </a>'; 
                ?>
                </td>
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
        <ul class="pagination pagination-lg">
        <?php
		  $q = $conn->query("SELECT * FROM mesyuarat");
          $rows = $q->fetchAll(PDO::FETCH_ASSOC);
          $total = ceil(count($rows)/10);

				?>

        <?php for ($i = 1; $i <=  $total; $i++) {?>
          <li><a href="addMesyuarat.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
        <?php } ?>
        </ul>
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

            <!-- Modal -->
            <div class="modal fade" id="modalMesyuarat" tabindex="-1" role="dialog" 
     aria-labelledby="modalMesyuarat" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content"  style="height:350px;">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="modalMesyuarat">
                    Tambah Mesyuarat
                </h4>
            </div>
            <!-- End Modal Header-->
            
              <!-- Modal Body -->
              <div class="modal-body">
                  
                  <!-- Form -->
                  <form method="POST" action="">
                    <!-- Kod Mesyuarat -->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label>Kod Mesyuarat:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <input type="text" id="mesy_kod" name="mesy_kod" class="form-control" placeholder="contoh: KURSUS">
                      </div>
                    </div>
                    <!-- End Kod Mesyuarat -->
                    <!-- Nama Mesyuarat-->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label>Nama Mesyuarat:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <input type="text" id="mesy_nama" name="mesy_nama" class="form-control" placeholder="contoh: Kursus Protokol">
                      </div>
                    </div>
                    <!-- End Nama Mesyuarat-->
                    <div class="form-group">
                      <div class="form-group col-md-12" style="text-align:right;">
                        <button type="submit" id="btnAddMesyuarat" name="btnAddMesyuarat" class="btn btn-success" 
                          onClick="return confirm('Anda pasti untuk TAMBAH mesyuarat ?');" >Tambah</button>
                          </form>
                          <!-- End Form -->
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                </div>
                  <!-- End Modal Body-->
        </div>
        <!-- End modal-content -->
    </div>
    <!-- End modal-dialog -->
</div>
<!-- End Modal -->

</body>
</html>