<?php

require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id"=>$id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php
    header('Content-Type: application/json');
    require_once('connection.php');

    $action= (isset($_GET['action']))?$_GET['action']:'read';

    switch($action){
        case 'add':

                $mesy_tarikh = $_POST['mesy_tarikh'];
                $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%m')");
                $mesy_bulan=$sql->fetchColumn();

                $result = $conn->prepare("INSERT INTO mesy(title,bil,mesy_huraian,
                color,textColor,start,end,jab_id,
                mesy_lokasi,mesy_tarikh,mesy_bulan,mesy_status,user_id)
                VALUES(:title,:bil,:mesy_huraian,:color,:textColor,:start,
                :end,:jab_id,:mesy_lokasi,
                :mesy_tarikh,'$mesy_bulan',:mesy_status,:user_id)");
                //$result = $conn->prepare("INSERT INTO mesy(title,mesy_huraian,
                //color,textColor,start,end,jab_id,mesy_pengerusi,
                //mesy_ahli,mesy_lokasi,mesy_tarikh,mesy_status,agensi_id,user_id)
                //VALUES(:title,:mesy_huraian,:color,:textColor,:start,
                //:end,:jab_id,:mesy_pengerusi,:mesy_ahli,:mesy_lokasi,
                //:mesy_tarikh,:mesy_status,:agensi_id,:user_id)");

                $answer=$result->execute(array(
                    "title" =>$_POST['title'],
                    "mesy_huraian" =>$_POST['mesy_huraian'],
                    "color" =>$_POST['color'],
                    "textColor" =>$_POST['textColor'],
                    "start" =>$_POST['start'],
                    "end" =>$_POST['end'],
                    
                    //from <select>
                    "jab_id" =>$_POST['jab_id'],
                    "mesy_lokasi" =>$_POST['mesy_lokasi'],
                    
                    "mesy_tarikh" =>$_POST['mesy_tarikh'],
                    "mesy_status" =>$_POST['mesy_status'],
                    "user_id" =>$_POST['user_id'],
                    "bil" =>$_POST['bil']
                ));

                $searchID = $conn->prepare("SELECT max(mesy_id) FROM mesy");
                $searchID ->execute();
                $mesy_id_current = $searchID ->fetchColumn();

                $mesy_pengerusi=$_POST['mesy_pengerusi'];
                foreach ($mesy_pengerusi as $mesy_pengerusir) {
                    $result3 = $conn->prepare("INSERT INTO mesy_pengerusi(mesy_id, ahli_id)
                    VALUES('$mesy_id_current',:mesy_ahli)");
                    $result3->bindParam(":mesy_ahli", $mesy_pengerusir);
                    $result3->execute();
                }

                //$mesy_ahli=$_POST['mesy_ahli'];
                //foreach ($mesy_ahli as $mesy_ahlir) {
                    //$results .= $mesy_ahlir . " ";
                    //$result1 = $conn->prepare("INSERT INTO mesy_ahli(mesy_id, ahli_id)
                    //VALUES('$mesy_id_current',$results)");
                    //$result1->execute();
                //}

                //- if(isset($_POST['mesy_ahli']))   
                //if (!empty($_POST['mesy_ahli']))
                //- {
                    //- $mesy_ahli = $_POST['mesy_ahli'];
                    //foreach($mesy_ahli as $ahli_idr)
                    //{
                        //- $result1 = $conn->prepare("INSERT INTO mesy_ahli(mesy_id, ahli_id)
                        //- VALUES('$mesy_id_current','$mesy_ahli')");
                        //$result1->bindParam($mesy_ahli, $ahli_idr);
                        //- $result1->execute();   
                    //}   
                //- }   else {
                    //- $result1 = $conn->prepare("INSERT INTO mesy_ahli(mesy_id, ahli_id)
                    //- VALUES('$mesy_id_current','abc')");
                    //- $result1->execute();   
                //- }

                $mesy_ahli=$_POST['mesy_ahli'];
                foreach ($mesy_ahli as $mesy_ahlir) {
                    $result1 = $conn->prepare("INSERT INTO mesy_ahli(mesy_id, ahli_id)
                    VALUES('$mesy_id_current',:mesy_ahli)");
                    $result1->bindParam(":mesy_ahli", $mesy_ahlir);
                    $result1->execute();
                }

                $agensi_id=$_POST['agensi_id'];
                foreach ($agensi_id as $agensi_idr) {
                    $result2 = $conn->prepare("INSERT INTO mesy_agensi(mesy_id, agensi_id)
                    VALUES('$mesy_id_current',:agensi_id)");
                    $result2->bindParam(":agensi_id", $agensi_idr);
                    $result2->execute();
                }

                //Program
                $prog_kod =$_POST['prog_kod'];
                $prog_nama =$_POST['prog_nama'];

                $sql = "INSERT INTO program (prog_kod,prog_nama)
                                VALUES('$prog_kod','$prog_nama')";

                $statement = $conn->prepare($sql);
                $statement->execute();
			
                //echo json_encode(array_merge($answer,$mesy_ahli,$agensi_id));
                echo json_encode($answer);
                //echo json_encode($mesy_ahli);
                //echo json_encode($agensi_id);
            break;
        case 'delete':
                $result=false;

                if(isset($_POST['mesy_id'])){
                    $ID = $_POST['mesy_id'];
                    //Status '4'- Batal
                    $result=$conn->prepare("UPDATE mesy 
                    SET mesy_status='4',
                        color='#000000',
                        textColor='#fff'
                    WHERE mesy_id=:mesy_id");
                    $answer= $result->execute(array("mesy_id"=>$ID));
                }
                echo json_encode($answer);
            break;
        case 'edit':

                $mesy_tarikh = $_POST['mesy_tarikh'];
                $sql = $conn->query("SELECT DATE_FORMAT('$mesy_tarikh', '%m')");
                $mesy_bulan=$sql->fetchColumn();

                $result = $conn->prepare("UPDATE mesy SET
                title=:title,
                bil=:bil,
                mesy_huraian=:mesy_huraian,
                color=:color,
                textColor=:textColor,
                start=:start,
                end=:end,
                jab_id=:jab_id,
                mesy_pengerusi=:mesy_pengerusi,
                mesy_lokasi=:mesy_lokasi,
                mesy_tarikh=:mesy_tarikh,
                mesy_bulan='$mesy_bulan',
                mesy_status=:mesy_status
                WHERE mesy_id=:mesy_id
                ");

                $answer=$result->execute(array(
                    "mesy_id"=>$_POST['mesy_id'],
                    "title" =>$_POST['title'],
                    "mesy_huraian" =>$_POST['mesy_huraian'],
                    "color" =>$_POST['color'],
                    "textColor" =>$_POST['textColor'],
                    "start" =>$_POST['start'],
                    "end" =>$_POST['end'],
                    
                    //from <select>
                    "jab_id" =>$_POST['jab_id'],
                    //"agensi_id" =>$_POST['agensi_id'],
                    "mesy_lokasi" =>$_POST['mesy_lokasi'],

                    "mesy_pengerusi" =>$_POST['mesy_pengerusi'],
                    //"mesy_ahli" =>$_POST['mesy_ahli'],
                    "mesy_tarikh" =>$_POST['mesy_tarikh'],
                    "mesy_status" =>$_POST['mesy_status'],
                    "bil" =>$_POST['bil']
                ));

                $result1 = $conn->prepare("UPDATE mesy_ahli SET 
                ahli_id=:ahli_id
                WHERE mesy_id=:mesy_id
                ");

                $mesy_ahli=$_POST['mesy_ahli'];
                foreach ($mesy_ahli as $mesy_ahlir) {
                    $result1 = $conn->prepare("INSERT INTO mesy_ahli(mesy_id, ahli_id)
                    VALUES(LAST_INSERT_ID(),:mesy_ahli)");
                    $result1->bindParam(":mesy_ahli", $mesy_ahlir);
                    $result1->execute();
                }

                $result2 = $conn->prepare("UPDATE mesy_agensi SET 
                agensi_id=:agensi_id 
                WHERE mesy_id=:mesy_id
                ");

                $agensi_id=$_POST['agensi_id'];
                foreach ($agensi_id as $agensi_idr) {
                    $result2 = $conn->prepare("INSERT INTO mesy_agensi(mesy_id, agensi_id)
                    VALUES(LAST_INSERT_ID(),:agensi_id)");
                    $result2->bindParam(":agensi_id", $agensi_idr);
                    $result2->execute();
                }

                //echo json_encode(array_merge($answer,$mesy_ahli,$agensi_id));
                echo json_encode($answer);
                //echo json_encode($mesy_ahli);
                //echo json_encode($agensi_id);
            break;
        default:
                //$result = $conn->prepare("SELECT 	
                //mesy.title,
                //mesy.mesy_huraian,
                //mesy.color,
                //mesy.textColor,
                //mesy.start,
                //mesy.end,
                //mesy.jab_id,
                //mesy.mesy_pengerusi,
                //mesy.mesy_lokasi,
                //mesy.mesy_tarikh,
                //mesy.mesy_status,m
                //mesy.user_id,
                //mesy_agensi.agensi_id,
                //mesy_ahli.ahli_id
                //FROM	mesy
                  //      INNER JOIN mesy_agensi
                    //            ON mesy.mesy_id = mesy_agensi.mesy_id
                      //  INNER JOIN mesy_ahli
                        //       ON mesy.mesy_id = mesy_ahli.mesy_id
        //");
                $result = $conn->prepare("SELECT * 	
                FROM	mesy
                        
        ");
                $result->execute();
                
                $show= $result->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($show);
                break;
    }

?>