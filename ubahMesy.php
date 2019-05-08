<?php
	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	$id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['ID'])) {
    try{
        include('connection.php');
        $ID = $_GET['ID'];
        $sql = "SELECT * FROM mesy 
        WHERE mesy_id='$ID'";
        $statement = $conn->prepare($sql);
        $statement->execute(array(":mesy_id"=>$ID));
        $mesyRow=$statement->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
  echo "Ada kesilapan dalam sambungan ke pengkalan data";
  exit;
}

//Nama mesyuarat
if (isset($_POST['btnUbahNama'])) {
    try {
        include('connection.php');
        $mesy =[
        "title"         =>$_POST['title']
      ];
  
      $sql = "UPDATE mesy
              SET 
                title=:title
                WHERE mesy_id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($mesy);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Huraian
if (isset($_POST['btnUbahHuraian'])) {
    try {
        include('connection.php');
        $mesy =[
        //"mesy_id"       =>$_POST['mesy_id'],
        //"title"         =>$_POST['title'],
        "mesy_huraian"  =>$_POST['mesy_huraian']
        //"start"         =>$_POST['start'],
        //from <select>
        //"jab_id"        =>$_POST['jab_id'],
        //"mesy_lokasi"   =>$_POST['mesy_lokasi'],
        //"mesy_pengerusi"=>$_POST['mesy_pengerusi'],
        //"mesy_tarikh"   =>$_POST['mesy_tarikh']
      ];
  
      $sql = "UPDATE mesy
              SET 
                mesy_huraian=:mesy_huraian
                WHERE mesy_id='$ID'";
        //$sql = "UPDATE mesy
        //SET 
          //title=:title,
          //mesy_huraian=:mesy_huraian,
          //start=:start,
          //jab_id=:jab_id,
          //mesy_pengerusi=:mesy_pengerusi,
          //mesy_lokasi=:mesy_lokasi,
          //mesy_tarikh=:mesy_tarikh
          //WHERE mesy_id=:mesy_id";
    $statement = $conn->prepare($sql);
    $statement->execute($mesy);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Bil
if (isset($_POST['btnUbahBil'])) {
    try {
        include('connection.php');
        $mesy =[
        "bil"         =>$_POST['bil']
      ];
  
      $sql = "UPDATE mesy
              SET 
                bil=:bil
                WHERE mesy_id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($mesy);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

//Lokasi
if (isset($_POST['btnUbahLokasi'])) {
    try {
        include('connection.php');
        $mesy =[
        "mesy_lokasi"   =>$_POST['mesy_lokasi']
      ];
  
      $sql = "UPDATE mesy
              SET 
                mesy_lokasi=:mesy_lokasi
                WHERE mesy_id='$ID'";

    $statement = $conn->prepare($sql);
    $statement->execute($mesy);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

  //Urusetia
    if (isset($_POST['btnUbahUrusetia'])) {
        try {
            include('connection.php');
            $mesy =[
            "jab_id"        =>$_POST['jab_id']
        ];
    
        $sql = "UPDATE mesy
                SET 
                    jab_id=:jab_id
                    WHERE mesy_id='$ID'";
            
        $statement = $conn->prepare($sql);
        $statement->execute($mesy);
        header("Refresh:0");
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

  //Pengerusi
  if (isset($_POST['btnUbahPengerusi'])) {
    try {
        include('connection.php');
        $mesy =[
        "mesy_pengerusi"=>$_POST['mesy_pengerusi']
    ];

    $sql = "UPDATE mesy
            SET 
                mesy_pengerusi=:mesy_pengerusi
                WHERE mesy_id='$ID'";
        
    $statement = $conn->prepare($sql);
    $statement->execute($mesy);
    header("Refresh:0");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

//Ahli (Tambah)
if (isset($_POST['btnTambahAhli'])) {
    try {
        include('connection.php');
        $ahli_id=$_POST['ahli_id'];
        foreach ($ahli_id as $ahli_idr) {
        $sql = "INSERT INTO mesy_ahli(mesy_id, ahli_id)
                VALUES($ID,:ahli_id)";
                
        $statement = $conn->prepare($sql);
        $statement->bindParam(":ahli_id", $ahli_idr);
        $statement->execute();
        header("Refresh:0");
      }
        
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }
  
//Ahli (Padam)
if (isset($_POST['btnPadamAhli'])) {
    try {
        include('connection.php');
        $ahli_idh=$_POST['ahli_idh'];

        $sql = "DELETE FROM mesy_ahli 
                WHERE ahli_id = '$ahli_idh'
                AND mesy_id='$ID' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Refresh:0");
    
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();

    }
  }

//Ahli (Emel)
if (isset($_POST['btnEmelAhli'])) {
    try {
        include('connection.php');
        $ahli_idh=$_POST['ahli_idh'];
        $sql = "UPDATE mesy_ahli
        SET 
          ahli_status='5'
          WHERE mesy_id = '$ID'
          AND ahli_id='$ahli_idh'";
        $statement = $conn->prepare($sql);
        $statement->execute($mesy);

        header('Location: emelAhliTetapan.php?ID='.$ID.'&ahli_idh='.$ahli_idh.'');

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();

    }
  }

//Agensi
if (isset($_POST['btnTambahAgensi'])) {
    try {
        include('connection.php');
        $agensi_id=$_POST['agensi_id'];
        foreach ($agensi_id as $agensi_idr) {
        $sql = "INSERT INTO mesy_agensi(mesy_id, agensi_id)
                VALUES($ID,:agensi_id)";
                
        $statement = $conn->prepare($sql);
        $statement->bindParam(":agensi_id", $agensi_idr);
        $statement->execute();
        header("Refresh:0");
      }
        
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  }

  //Agensi (Padam)
if (isset($_POST['btnPadamAgensi'])) {
    try {
        include('connection.php');
        $agensi_idh=$_POST['agensi_idh'];

        $sql = "DELETE FROM mesy_agensi
                WHERE agensi_id = '$agensi_idh'
                AND mesy_id='$ID' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("Refresh:0");
    
    } catch(PDOException $error) {
        echo $ahli_idh;

    }
  }

  //Agensi (Emel)
if (isset($_POST['btnEmelAgensi'])) {
    try {
        include('connection.php');
        $agensi_idh=$_POST['agensi_idh'];
        $sql = "UPDATE mesy_agensi
        SET 
          agensi_status='5'
          WHERE mesy_id = '$ID'
          AND agensi_id='$agensi_idh'";
        $statement = $conn->prepare($sql);
        $statement->execute($mesy);

        header('Location: emelAgensiTetapan.php?ID='.$ID.'&agensi_idh='.$agensi_idh.'');

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();

    }
  }

?>

<?php include "head.php"; ?>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<?php
$user_type = $userRow['user_type'];
  if($user_type == 'pentadbir'){
    include "adminpage/headeradmin.php";
  }
  else{
    include "headerhome.php";
  }
  ?>

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
    <div class="col-md-10 col-sm-12 col-xs-12"><!-- Start Col 1 -->
        <div class="row">
            <div class="form-group col-md-2">
            <label>ID:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_id" name="mesy_id" class="form-control" value="<?php echo $mesyRow['mesy_id'];?>" readonly>
            </div>                    
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Nama Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
            <?php $title = $mesyRow['title']; ?>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo $title; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahNama" name="btnUbahNama" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH <?php echo $title; ?> ?');" >Ubah</button>
            </div> 
        </form>     
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Huraian:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_huraian" name="mesy_huraian" class="form-control" value="<?php echo $mesyRow['mesy_huraian']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahHuraian" name="btnUbahHuraian" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH <?php echo $mesyRow['mesy_huraian']; ?> ?');" >Ubah</button>
            </div>  
        </form>  
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Bil:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="bil" name="bil" class="form-control" value="<?php echo $mesyRow['bil']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahBil" name="btnUbahBil" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH <?php echo $mesyRow['bil']; ?> ?');" >Ubah</button>
            </div>  
        </form>  
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Tarikh:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $mesy_tarikh = $mesyRow['mesy_tarikh'];
            $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%d/%m/%Y') FROM mesy
            WHERE mesy_id='$ID'");
            $mesy_tarikh_new=$sql->fetchColumn();
            ?>
            <input type="text" id="txtTarikh" class="form-control" name="txtTarikh" value="<?php echo $mesy_tarikh_new; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Masa:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $start=$mesyRow['start'];
            
            $sql = $conn->query("SELECT TIME_FORMAT('$start', '%h:%i %p') FROM mesy
            WHERE mesy_id='$ID'");
            $start_new=$sql->fetchColumn();
            ?>
                <div class="form-group col-md-3">
                    <input type="text" id="txtMasa" name="txtMasa" class="form-control" value="<?php echo $start_new; ?>" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label> sehingga </label>
                </div>
            <?php
            $end=$mesyRow['end'];
            
            $sql = $conn->query("SELECT TIME_FORMAT('$end', '%h:%i %p') FROM mesy
            WHERE mesy_id='$ID'");
            $end_new=$sql->fetchColumn();
            ?>
                <div class="form-group col-md-3">
                    <input type="text" id="txtMasa" name="txtMasa" class="form-control" value="<?php echo $end_new; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Lokasi Baru:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
                    require_once('connection.php');
                    $result = $conn->prepare("SELECT * FROM bilik");
                    $result->execute();
                    $bilik = $result->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <select id="mesy_lokasi" name="mesy_lokasi"  class="form-control">
                <option selected="" disabled="">--- Pilih Lokasi ---</option><?php 
                    foreach ($bilik as $output){ 
                        echo "<option bilik_id='".$output['bilik_id']."'value='".$output['bilik_id']."'>".$output['bilik_nama']."</option>";
                    }
                ?>
            </select>
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahLokasi" name="btnUbahLokasi" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH lokasi ?');" >Ubah</button>
            </div>     
        </form>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Lokasi:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $mesy_lokasi = $mesyRow['mesy_lokasi'];
            $sql = $conn->query("SELECT bilik_nama FROM bilik
            WHERE bilik_id='$mesy_lokasi'");
            $bilik_nama=$sql->fetchColumn();
            ?>
            <input type="text" id="mesy_lokasi" name="mesy_lokasi" class="form-control" value="<?php echo $bilik_nama; ?>" readonly>
            </div>
        </div> 
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label for="txturusetia">Urusetia Baru:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
                require_once('connection.php');
                $result = $conn->prepare("SELECT * FROM jab");
                $result->execute();
                $jab = $result->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <select id="jab_id" name="jab_id" class="form-control">
                <option selected="" disabled="">--- Pilih Urusetia ---</option>
                <?php 
                    foreach ($jab as $output){ 
                        echo "<option jab_id='".$output['jab_id']."'value='".$output['jab_id']."'>".$output['jab_nama']."</option>";
                    }
                ?>
            </select>
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahUrusetia" name="btnUbahUrusetia" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH urusetia ?');" >Ubah</button>
            </div>     
        </form>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Urusetia:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            $jab_id = $mesyRow['jab_id'];
            $sql = $conn->query("SELECT jab_nama FROM jab
            WHERE jab_id='$jab_id'");
            $jab_nama=$sql->fetchColumn();
            ?>
            <input type="text" id="jab_id" name="jab_id" class="form-control" value="<?php echo $jab_nama; ?>" readonly>
            </div>
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Pengerusi:</label>
            </div>
            <div class="form-group col-md-8">
            <input type="text" id="mesy_pengerusi" name="mesy_pengerusi" class="form-control" value="<?php echo $mesyRow['mesy_pengerusi']; ?>">
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnUbahPengerusi" name="btnUbahPengerusi" class="btn btn-primary" onClick="return confirm('Anda pasti untuk UBAH pengerusi ?');" >Ubah</button>
            </div>  
        </form>
        </div>  
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Ahli Mesyuarat Baru:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
                    require_once('connection.php');
                    $result = $conn->prepare("SELECT * FROM ahli");
                    $result->execute();
                    $ahli = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>	
                <select id="ahli_id" name="ahli_id[]" class="chosen" multiple="multiple" data-placeholder="Pilih Ahli Mesyuarat...">	
                <?php 
                if (! empty($ahli)) {
                    foreach ($ahli as $key => $value){ 
                        echo "<option ahli_id='".$ahli[$key]['ahli_id']."'value='".$ahli[$key]['ahli_id']."'>".$ahli[$key]['ahli_nama']." [".$ahli[$key][ ('ahli_id')]."]"."</option>";
                        } 
                    }
                ?>
                </select>
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnTambahAhli" name="btnTambahAhli" class="btn btn-primary btn-sm" onClick="return confirm('Anda pasti untuk TAMBAH ahli ?');">
                <span class="glyphicon glyphicon-plus"></span>
            </button>
            </div>   
        </form>
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Ahli Mesyuarat:</label>
            </div>
            <div class="form-group col-md-8">
                <?php
                if (isset($_GET['ID'])) {
                    include('connection.php');
                    $ID = $_GET['ID'];
                    $sql = "SELECT * FROM mesy_ahli
                    WHERE mesy_id='$ID'";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $ahliRow=$statement->fetchAll(PDO::FETCH_ASSOC);
                    if ($ahliRow && $statement->rowCount() > 0) { 
                    $counter = 1; 
                    foreach ($ahliRow as $row) {
                        $ahli_id = $row['ahli_id'];

                        $sql = $conn->query("SELECT ahli_nama FROM ahli
                        WHERE ahli_id='$ahli_id'");
                        $ahli_id_new=$sql->fetchColumn();
                ?>
                <form method="post">
                <div class="form-group col-md-9">
                    <input type="hidden" id="ahli_idh" name="ahli_idh" class="form-control" value="<?php echo $ahli_id; ?>">
                    <?php 
                    $sql = $conn->query("SELECT ahli_emel FROM ahli
                    WHERE ahli_id='$ahli_id'");
                    $ahli_id_emel=$sql->fetchColumn();
                    ?>
                    <input type="hidden" id="ahli_ide" name="ahli_ide" class="form-control" value="<?php echo $ahli_id_emel; ?>">
                    <input type="text" id="ahli_id" name="ahli_id" class="form-control" value="<?php echo $counter; ?>. <?php echo $ahli_id_new; ?>" readonly>
                </div>
                <div class="form-group col-md-3">         
                <?php
                    $sql = $conn->query("SELECT ahli_status FROM mesy_ahli
                    WHERE ahli_id='$ahli_id'
                    AND mesy_id='$ID'");
                    $ahli_status=$sql->fetchColumn();

                if($ahli_status == '6'){
                    ?>
                    <button type="button" class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php }
                else  if ($ahli_status == '5'){ ?>   
                    <button type="button" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-time"></span>
                    </button>
                    <?php } 
                else { 
                    $status = $mesyRow['mesy_status']; 
                    if ($status == '1'){?>
                    <button type="button" class="btn btn-basic btn-sm">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                    <?php } else {?>
                    <button type="submit" id="btnEmelAhli" name="btnEmelAhli" class="btn btn-warning btn-sm" onClick="return confirm('Anda pasti untuk EMEL ahli ?');">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                <?php
                }}
                ?>
                    <button type="submit" id="btnPadamAhli" name="btnPadamAhli" class="btn btn-danger btn-sm" onClick="return confirm('Anda pasti untuk PADAM ahli ?');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
                </form>
                <?php $counter++; 
                 } 
                } else {
                ?> 
                Tiada ahli mesyuarat yang didaftarkan lagi
            <?php
                } ?> 
                </div>
                <?php } else {
                ?> 
            Tidak dapat data
            <?php } ?>
        </div>
        <div class="row">
        <form method="post">
            <div class="form-group col-md-2">
            <label>Agensi Baru:</label>
            </div>
            <div class="form-group col-md-8">
                <?php
                    require_once('connection.php');
                    $result = $conn->prepare("SELECT * FROM agensi");
                    $result->execute();
                    $agensi = $result->fetchAll(PDO::FETCH_ASSOC);
                ?>	
                <select id="agensi_id" name="agensi_id[]" class="chosen" multiple="multiple" data-placeholder="Pilih Agensi...">	
                <option value="Tiada" >Tiada</option>			
                <?php 
                if (! empty($agensi)) {
                    foreach ($agensi as $key => $value){ 
                        echo "<option agensi_id='".$agensi[$key]['agensi_id']."'value='".$agensi[$key]['agensi_id']."'>".$agensi[$key]['agensi_nama']."</option>";
                        } 
                    }
                ?>
                </select>
            </div>
            <div class="form-group col-md-2">
            <button type="submit" id="btnTambahAgensi" name="btnTambahAgensi" class="btn btn-primary btn-sm" onClick="return confirm('Anda pasti untuk TAMBAH agensi ?');">
                <span class="glyphicon glyphicon-plus"></span>
            </button>
            </div>  
        </form> 
        </div>
        <div class="row">
            <div class="form-group col-md-2">
            <label>Agensi:</label>
            </div>
            <div class="form-group col-md-8">
            <?php
            if (isset($_GET['ID'])) {
                include('connection.php');
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM mesy_agensi
                WHERE mesy_id='$ID'";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $agensiRow=$statement->fetchAll(PDO::FETCH_ASSOC);
                if ($agensiRow && $statement->rowCount() > 0) { 

                $counter = 1; 
                foreach ($agensiRow as $row) {
                    $agensi_id = $row['agensi_id'];

                    $sql = $conn->query("SELECT agensi_nama FROM agensi
                    WHERE agensi_id='$agensi_id'");
                    $agensi_id_new=$sql->fetchColumn();
            ?>
                <form method="post">
                <div class="form-group col-md-9">
                    <input type="hidden" id="agensi_idh" name="agensi_idh" class="form-control" value="<?php echo $agensi_id; ?>">

                    <input type="text" id="agensi_id" name="agensi_id" class="form-control" value="<?php echo $counter; ?>. <?php echo $agensi_id_new; ?>" readonly>  
                </div>
                <div class="form-group col-md-3">         
                <?php
                    $sql = $conn->query("SELECT agensi_status FROM mesy_agensi
                    WHERE agensi_id='$agensi_id'
                    AND mesy_id='$ID'");
                    $agensi_status=$sql->fetchColumn();

                if($agensi_status == '6'){
                    ?>
                    <button type="button" class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <?php }
                else  if ($agensi_status == '5'){ ?>   
                    <button type="button" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-time"></span>
                    </button>
                <?php } 
                else { 
                    $status = $mesyRow['mesy_status']; 
                    if ($status == '1'){?>
                    <button type="button" class="btn btn-basic btn-sm">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                    <?php } else {?>
                    <button type="submit" id="btnEmelAgensi" name="btnEmelAgensi" class="btn btn-warning btn-sm" onClick="return confirm('Anda pasti untuk EMEL agensi ?');">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                <?php
                }}
                ?>
                    <button type="submit" id="btnPadamAgensi" name="btnPadamAgensi" class="btn btn-danger btn-sm" onClick="return confirm('Anda pasti untuk PADAM agensi ?');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
                </form>
                <?php $counter++;
                }
                } else {
                    ?> 
                    Tiada agensi yang didaftarkan lagi
            <?php
                }
            } else {
                ?> 
                Tidak dapat data
            <?php } ?>
            <tbody>
            </table>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12" style="text-align:center;">

            <?php 
            echo '<a href="simpanMesy.php?ID='.$ID.'" class="btn btn-info" role="button" onClick="return confirm(\'Anda pasti untuk SIMPAN '.$title.' ?\');">Simpan</a>'; ?>
            </div>
        </div>
        <div class="row">
        <hr>
            <?php
            $user_id = $mesyRow['user_id'];

            $sql = $conn->query("SELECT user_name FROM users
            WHERE id='$user_id'");
            $user_nama=$sql->fetchColumn();

            $sql = $conn->query("SELECT user_id FROM users
            WHERE id='$user_id'");
            $pengguna_id=$sql->fetchColumn();

            $adding_date = $mesyRow['adding_date'];
            $sql = $conn->query("SELECT DATE_FORMAT('$adding_date', '%d/%m/%Y') FROM mesy
            WHERE mesy_id='$ID'");
            $adding_date_new=$sql->fetchColumn();
            ?>
        <small>Didaftarkan oleh: <?php echo $user_nama; ?> (<?php echo $pengguna_id; ?>) pada <?php echo $adding_date_new; ?> <small>
        </div>
        </div> <!-- End Col 1 -->
        <div class="col-md-2 col-sm-* col-xs-*"> <!-- Start Col 2 -->
            <div class="row">
            <blockquote>
                <h6><b>Arahan :</b><br/> 1. Sila tekan 'ubah' untuk mengubah data yang ada. <br/><br/>
                 2. Setelah selesai mengubah data, sila tekan 'simpan'.<br/><br/>
                 3. Bagi mengubah tarikh dan masa, sila tekan 'tunda' untuk menunda mesyuarat ini. <br/><br/>
                 Sila tekan <br/>
                 <?php echo '<a href="tundaMesy.php?ID='.$ID.'" class="btn btn-warning" role="button" onClick="return confirm(\'Anda pasti untuk TUNDA '.$title.' ?\');">
                 Tunda</a>'; ?> <br/>untuk menunda mesyuarat ini.<br/><br/>
                 4.Sila tekan <br/>
                 <?php echo '<a href="padamMesy.php?ID='.$ID.'" class="btn btn-danger" role="button" onClick="return confirm(\'Anda pasti untuk PADAM '.$title.' ?\');">
                 Padam</a>'; ?> <br/>untuk memadam mesyuarat ini.<br/><br/>
                 5. Status Penghantaran Emel<br/>
                 bagi penggunaan bilik yang telah lulus<br/>
                <p><button type="button" class="btn btn-success btn-sm">
                    <span class="glyphicon glyphicon-ok"></span>
                </button> = Emel telah diterima<br/>
                <button type="button" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-time"></span>
                </button> = Emel telah dihantar<br/>
                <button type="submit" id="btnEmelAhli" name="btnEmelAhli" class="btn btn-warning btn-sm">
                    <span class="glyphicon glyphicon-envelope"></span>
                </button> = Emel belum dihantar <br/>(Sila klik untuk hantar emel)<br/></p></h6>
            </blockquote>
            </div>
        </div> <!-- End Col 2 -->
        </div>
  </section>
  <!-- /Section: about -->

  <?php include "footer.php"; ?>

</body>
</html>