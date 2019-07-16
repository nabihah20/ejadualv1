<?php

require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id"=>$id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    // connect to database 
    require_once('connection.php');

    // Do Prepared Query 
    $result = $conn->prepare("SELECT * FROM jab");
    $result->execute();
    

    //Initialize array variable
    $dbdata = array();

    //Fetch into associative array
        while ( $jab = $result->fetchAll(PDO::FETCH_ASSOC))  {
        $dbdata[]=$jab;
        }
    
    //Print array in JSON format
    echo json_encode($dbdata);
    
    // return the result in json
    //echo json_encode($data);
  ?>
