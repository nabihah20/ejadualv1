<?php include "head.php"; ?>
		<body>

		  <header id="header" id="home" >
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
				  <div id="logo">
					<a href="index.php"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
				  </div>
				  <nav id="nav-menu-container">
					<ul class="nav-menu">
					  <li class="menu-has-children"><a href="#">Jadual</a>
						<ul>
						  <li><a href="jadualsu.php">Setiausaha Bandaran</a></li>
						  <li><a href="jadualmesy.php">Mesyuarat</a></li>
						</ul>
					  </li>
					</ul>
				  </nav><!-- #nav-menu-container -->		    		
				</div>
			</div>
		  </header><!-- #header -->	

			<section class="generic-banner relative"  style="background-color: #80dfff; height: 837px; width: auto;" >	
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-10">
							<div class="generic-banner-content" >
                                <h2 class="text-white">Log Masuk</h2>
                                <div class="container">
                                <div class="row">
                                    <div class="col-sm-5">
                                        
                                        <div class="form-box">
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3>Penganjur Mesyuarat</h3>
                                                    <p>Sila masukkan id staf dan kata laluan:</p>
                                                </div>
                                            </div>
                                            <div class="form-bottom">
                                                <form role="form" action="" method="post" class="login-form">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-username">Username</label>
                                                        <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-password">Password</label>
                                                        <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                                                    </div>
                                                    <button type="submit"  class="btn btn-primary btn-block btn-flat">Log Masuk</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-1 middle-border"></div>
                                    <div class="col-sm-1"></div>
                                        
                                    <div class="col-sm-5">
                                        
                                        <div class="form-box">
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3>Pentadbiran </h3>
                                                    <p>Sila masukkan id staf dan kata laluan:</p>
                                                </div>
                                            </div>
                                            <div class="form-bottom">
                                                <form role="form" action="" method="post" class="login-form">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-username">Username</label>
                                                        <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-password">Password</label>
                                                        <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                                                    </div>
                                                    <button type="submit"  class="btn btn-primary btn-block btn-flat">Log Masuk</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>	
                            </div>						
						</div>
					</div>
				</div>
			</section>		
			<!-- End banner Area -->
					
			
<?php include "footer.php"; ?>