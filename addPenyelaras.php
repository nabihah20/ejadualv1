<?php 
	require_once("session.php");
	
	require_once("class.user.php");

	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

//Tambah bilik untuk penyelaras
if (isset($_POST['btnAddpenyelaras'])) {
  try {
      include('connection.php');
      $users =[
      "user_id"                 =>$_POST['user_id'],
      "incharge_bilik"                =>$_POST['incharge_bilik']

    ];

    $sql = "UPDATE users
            SET 
            incharge_bilik=:incharge_bilik
              WHERE user_id=:user_id";

  $statement = $conn->prepare($sql);
  $statement->execute($users);
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
              <h2 class="h-bold">Maklumat Penyelaras Bilik</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="paging">          


    <div class="row">
      <div class="form-group col-md-12" style="text-align:right;">
        <!-- Trigger the modal with a button -->
        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalPenyelaras"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
      </div>

    </div>
    <!-- "Lead" text at top of column. -->
    <p class="lead">Senarai Penyelaras Bilik yang didaftarkan</p>

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
              $sql = "SELECT * FROM users 
              WHERE user_type = 'penyelaras'
              AND incharge_bilik IS NOT NULL
              LIMIT $page1, 10";
              $statement = $conn->prepare($sql);
              $statement->execute();
              $result = $statement->fetchAll();
              
             if ($result && $statement->rowCount() > 0) {
          ?>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID Pengguna</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Emel</th>
                  <th scope="col">Bilik</th>
                  <th scope="col">Tindakan</th>
                </tr>
              </thead>
            <?php
              $counter = 1; 
              foreach ($result as $row) {
                  $id = $row['id'];
                  $user_id = $row['user_id'];
                  $nama = $row['user_name'];
                  $emel = $row['user_email'];
                  $bilik = $row['incharge_bilik'];
            ?>

            <tbody>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo '<a href="lihatPenyelaras.php?ID='.$id.'">'.$user_id.'</a>'; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $emel; ?></td>
                <td><?php echo $bilik; ?></td>
                <td>
                <?php 
                echo '<a href="padamPenyelaras.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk PADAM '.$user_id.' ?\');">
                <span class="glyphicon glyphicon-trash"></span>
                </a>'; ?> &emsp;
                <?php
                echo '<a href="ubahPenyelaras.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk UBAH '.$user_id.' ?\');">
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
            <td>Tiada penyelaras bilik didaftarkan lagi</td>
        </tr>
<?php
    }
?>
          </tbody>
        </table>	
        <ul class="pagination pagination-lg">
        <?php
		  $q = $conn->query("SELECT * FROM users WHERE user_type = 'penyelaras' ");
          $rows = $q->fetchAll(PDO::FETCH_ASSOC);
          $total = ceil(count($rows)/10);

				?>

        <?php for ($i = 1; $i <=  $total; $i++) {?>
          <li><a href="addPenyelaras.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
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
            <div class="modal fade" id="modalPenyelaras" tabindex="-1" role="dialog" 
     aria-labelledby="modalPenyelaras" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content"  style="height:350px;">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="modalPenyelaras">
                    Tambah Penyelaras
                </h4>
            </div>
            <!-- End Modal Header-->
            
              <!-- Modal Body -->
              <div class="modal-body">
                  
                  <!-- Form -->
                  <form method="POST" action="">
                    <!-- ID Pengguna -->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label>ID Pengguna:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <?php
                          require_once('connection.php');
                          $result = $conn->prepare("SELECT * FROM users WHERE user_type='penyelaras' AND incharge_bilik IS NULL");
                          $result->execute();
                          $user_id = $result->fetchAll(PDO::FETCH_ASSOC);                      
                        ?>
                        <select id="user_id" name="user_id" class="chosen">
                        <option selected="" disabled="">--- Pilih ID Pengguna ---</option>
                          <?php 
                            foreach ($user_id as $output){ 
                              echo "<option 'user_id='".$output['user_id']."'value='".$output['user_id']."'>".$output['user_name']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <!-- End ID Pengguna -->
                    <!-- Bilik-->
                    <div class="form-group">
                      <div class="form-group col-md-3">
                        <label for="incharge_bilik">Bilik:</label>
                      </div>
                      <div class="form-group col-md-9">
                        <?php
                            require_once('connection.php');
                            $result = $conn->prepare("SELECT * FROM bilik");
                            $result->execute();
                            $bilik = $result->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <select id="incharge_bilik" name="incharge_bilik" class="chosen">
                          <option selected="" disabled="">--- Pilih Bilik ---</option><?php 
                            foreach ($bilik as $output){ 
                              echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <!-- End Bilik-->
                    <div class="form-group">
                      <div class="form-group col-md-12" style="text-align:right;">
                        <button type="submit" id="btnAddPenyelaras" name="btnAddPenyelaras" class="btn btn-success" 
                          onClick="return confirm('Anda pasti untuk TAMBAH penyelaras ?');" >Tambah</button>
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