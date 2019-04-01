<?php
    header('Content-Type: application/json');
    require_once('connection.php');

    $action= (isset($_GET['action']))?$_GET['action']:'read';

    switch($action){
        default:

                $result = $conn->prepare("SELECT * 	
                FROM	mesy
                        
        ");
                $result->execute();
                
                $show= $result->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($show);
                break;
    }

?>