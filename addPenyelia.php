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
              <h2 class="h-bold">Maklumat Penyelia Bilik</h2>
              <div class="divider-header"></div>
            </div>
          </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="modalPenyelia" tabindex="-1" role="dialog" 
     aria-labelledby="modalPenyelia" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="modalPenyelia">
                    Tambah Penyelia
                </h4>
            </div>
            <!-- End Modal Header-->
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <!-- Form -->
                <form class="form-horizontal" role="form">
                  <!-- ID Pengguna -->
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <!-- End ID Pengguna -->
                  <!-- Bilik-->
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword3" placeholder="Password"/>
                    </div>
                  </div>
                  <!-- End Bilik-->
                  <!-- Tambah -->
                  <div class="form-group">
                      <button type="submit" class="btn btn-default">Sign in</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  </div>
                  <!-- End Tambah -->
                </form>
                <!-- End Form -->
            </div>
            <!-- End Modal Body-->
        </div>
        <!-- End modal-content -->
    </div>
    <!-- End modal-dialog -->
</div>
<!-- End Modal -->

      </div>
    </div>

    <div class="container">
      <div class="paging">





    <div class="row">
      <div class="form-group col-md-12" style="text-align:right;">
        <!-- Trigger the modal with a button -->
        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalPenyelia"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
      </div>
    </div>
    <!-- "Lead" text at top of column. -->
    <p class="lead">Senarai Penyelia Bilik yang didaftarkan</p>

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
              WHERE user_type = 'penyelia'
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
                <td><?php echo '<a href="lihatPenyelia.php?ID='.$id.'">'.$user_id.'</a>'; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $emel; ?></td>
                <td><?php echo $bilik; ?></td>
                <td>
                <?php 
                echo '<a href="padamPenyelia.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk PADAM '.$user_id.' ?\');">
                <span class="glyphicon glyphicon-trash"></span>
                </a>'; ?> &emsp;
                <?php
                echo '<a href="ubahPenyelia.php?ID='.$id.'" onClick="return confirm(\'Anda pasti untuk UBAH '.$user_id.' ?\');">
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
            <td>Tiada penyelia bilik didaftarkan lagi</td>
        </tr>
<?php
    }
?>
          </tbody>
        </table>	
        <ul class="pagination pagination-lg">
        <?php
		  $q = $conn->query("SELECT * FROM users WHERE user_type = 'penyelia' ");
          $rows = $q->fetchAll(PDO::FETCH_ASSOC);
          $total = ceil(count($rows)/10);

				?>

        <?php for ($i = 1; $i <=  $total; $i++) {?>
          <li><a href="addPenyelia.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
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

  <!-- setTimeout after 2 seconds -->
  <script type="text/javascript">
    setTimeout(function() {
        setInterval(function() {
            $('#imgdone').attr('src',$('#imgdone').attr('src'))
        },1)
    }, 2000)
</script>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</body>
</html>