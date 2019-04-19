<?php 
	require_once("session.php");
	
	require_once("class.user.php");

	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

//Tambah ahli
if (isset($_POST['btnAddAhli'])) {
  try {
      include('connection.php');
      $ahli =[
      "ahli_id"                 =>$_POST['ahli_id'],
      "ahli_nama"                =>$_POST['ahli_nama'],
      "ahli_emel"                =>$_POST['ahli_emel']
    ];

    $sql = "INSERT INTO ahli(ahli_id,ahli_nama,ahli_emel)
            VALUES(:ahli_id,:ahli_nama,:ahli_emel)";

  $statement = $conn->prepare($sql);
  $statement->execute($ahli);
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
              <h2 class="h-bold">Maklumat Ahli Mesyuarat</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="paging">

        <!-- "Lead" text at top of column. -->
        <p class="lead">Senarai Ahli yang didaftarkan</p>
        <div class="row">
            <div class="form-group col-md-12" style="text-align:right;">
              <!-- Trigger the modal with a button -->
              <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAhli"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
            </div>
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
              $sql = "SELECT * FROM ahli 
              LIMIT $page1, 10";
              $statement = $conn->prepare($sql);
              $statement->execute();
              $result = $statement->fetchAll();
              
             if ($result && $statement->rowCount() > 0) {
          ?>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID Ahli</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Emel</th>
                  <th scope="col">Tindakan</th>
                </tr>
              </thead>
            <?php
              $counter = 1; 
              foreach ($result as $row) {
                  $id = $row['id'];
                  $ahli_id = $row['ahli_id'];
                  $nama = $row['ahli_nama'];
                  $emel = $row['ahli_emel'];
            ?>

            <tbody>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo '<a href="lihatAhli.php?ID='.$id.'">'.$ahli_id.'</a>'; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $emel; ?></td>
                <td>
                <?php 
                echo '<a href="padamAhli.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk PADAM '.$ahli_id.' ?\');">
                <span class="glyphicon glyphicon-trash"></span>
                </a>'; ?> &emsp;
                <?php
                echo '<a href="ubahAhli.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk UBAH '.$ahli_id.' ?\');">
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
            <td>Tiada ahli mesyuarat didaftarkan lagi</td>
        </tr>
<?php
    }
?>
          </tbody>
        </table>	
        <ul class="pagination pagination-lg">
        <?php
		  $q = $conn->query("SELECT * FROM ahli");
          $rows = $q->fetchAll(PDO::FETCH_ASSOC);
          $total = ceil(count($rows)/10);

				?>

        <?php for ($i = 1; $i <=  $total; $i++) {?>
          <li><a href="addAhli.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
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
    <div class="modal fade" id="modalAhli" tabindex="-1" role="dialog" 
     aria-labelledby="modalAhli" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content"  style="height:350px;">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="modalAhli">
                    Tambah Ahli
                </h4>
            </div>
            <!-- End Modal Header-->
            
              <!-- Modal Body -->
              <div class="modal-body">
                  
                  <!-- Form -->
                  <form method="POST" action="">
                    <!-- ID Ahli -->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label>ID Ahli:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <input type="text" id="ahli_id" name="ahli_id" class="form-control" placeholder="contoh: DB">
                      </div>
                    </div>
                    <!-- End ID Ahli -->
                    <!-- Nama Ahli-->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label>Nama Ahli:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <input type="text" id="ahli_nama" name="ahli_nama" class="form-control" placeholder="contoh: Datuk Bandar">
                      </div>
                    </div>
                    <!-- End Nama Ahli-->
                    <!-- Emel Ahli-->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label>Emel Ahli:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <input type="text" id="ahli_emel" name="ahli_emel" class="form-control" placeholder="Masukkan Emel">
                      </div>
                    </div>
                    <!-- End Emel Ahli-->
                    <div class="form-group">
                      <div class="form-group col-md-12" style="text-align:right;">
                        <button type="submit" id="btnAddAhli" name="btnAddAhli" class="btn btn-success" 
                          onClick="return confirm('Anda pasti untuk TAMBAH ahli ?');" >Tambah</button>
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