  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation" style="padding: 1px 0px;">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="site-logo">
              <a href="home.php" class="brand"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
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
                <li class="active"><a href="home.php#intro">Home</a></li>
                <li><a href="home.php#works">Cara Penggunaan</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carian Mesyuarat <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="search.php">Carian Mengikut Kata Kunci</a></li>
                        <li><a href="detailsearch.php">Carian Terperinci</a></li>
                    </ul>
                </li>
                <li><a href="senarai.php">Senarai</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jadual <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="jadualmesy.php">Mesyuarat</a></li>
                        <!--<li><a href="jadualsu.php">Setiausaha Bandaran</a></li>-->
                    </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                 Hi <?php echo $userRow['user_id']; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <?php 
                  $user_type = $userRow['user_type'];
                  if($user_type == 'penyelaras'){ ?>
                    <li><a href="statusmesy.php">Status Mesyuarat</a></li>
                  <?php }
              
                  else if($user_type == 'pemohon') { ?>
                    <li><a href="profil.php">Profil Saya</a></li>
                  <?php }
              
                  else if($user_type == 'pentadbir') { ?>
                    <li><a href="laporan.php">Laporan Mesyuarat</a></li>
                  <?php } ?>   
                    <li><a href="manual_eJadual.pdf" target="_blank">Panduan Penggunaan</a></li>
                    <li><a href="logout.php?logout=true">Daftar Keluar</a></li>
                  </ul>
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