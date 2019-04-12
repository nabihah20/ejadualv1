  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation" style="padding: 1px 0px;">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="homeA.php" class="brand"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
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
            <!--<ul class="nav navbar-nav navbar-right" style="background: rgba(255, 255, 255, 0);">-->
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="homeA.php">Home</a></li>
                <li><a href="logoutToRegister.php?logout=true">Daftar Ahli</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lihat <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addMesy.php">Mesyuarat</a></li>
                        <li><a href="addUser.php">Pengguna</a></li>
                        <li><a href="addPenyelia.php">Penyelia Bilik</a></li>
                        <li><a href="addBilik.php">Bilik</a></li>
                        <li><a href="addAgensi.php">Agensi</a></li>
                        <li><a href="addAhli.php">Ahli Mesyuarat</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php if($id == ''){ ?>
                    Salam tetamu
                  <?php } else{ ?>
                    Hi <?php echo $userRow['user_id']; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="laporan.php">Laporan Mesyuarat</a></li>           
                    <li><a href="logout.php?logout=true">Daftar Keluar</a></li>
                  </ul>
                  <?php } ?>
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