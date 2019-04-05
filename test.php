<?php

require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id"=>$id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    require_once('connection.php');
    $searchID = $conn->prepare("SELECT max(mesy_id) FROM mesy");
    $searchID ->execute();
    $mesy_id_current = $searchID ->fetchColumn();
    echo $mesy_id_current;
    ?>
    