<?php

/**
  * Tunda a mesy
  */

require_once('connection.php');
require_once("session.php");
require_once("class.user.php");
$auth_user = new USER();
$id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id"=>$id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['ID'])) {
        try {
            $ID = $_GET['ID'];

            //Status '3'- Tunda
            $result=$conn->prepare("UPDATE mesy 
            SET mesy_status='3', 
                color='#ff9800',
                textColor='#000'
            WHERE mesy_id = $ID");
            $answer= $result->execute(array("mesy_id"=>$ID));

            header('Refresh:0; url=ubahMesyTunda.php?ID='.$ID.'&berjaya');
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
?>



