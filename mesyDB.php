<?php
    require_once('connection.php');

    $action= (isset($_GET['action']))?$_GET['action']:'read';

    switch($action){
        case 'add':
                $result = $conn->prepare("INSERT INTO eventos(title,description,
                color,textColor,start,end)
                VALUES(:title,:description,:color,:textColor,:start,:end)");

                $answer=$result->execute(array(
                    "title" =>$_POST['title'],
                    "description" =>$_POST['description'],
                    "color" =>$_POST['color'],
                    "textColor" =>$_POST['textColor'],
                    "start" =>$_POST['start'],
                    "end" =>$_POST['end']
                ));
                echo json_encode($answer);
            break;
        case 'delete':
                $result=false;

                if(isset($_POST['id'])){

                    $result=$conn->prepare("DELETE FROM eventos WHERE ID=:ID");
                    $answer= $result->execute(array("ID"=>$_POST['id']));
                }
                echo json_encode($answer);
            break;
        case 'edit':
                $result = $conn->prepare("UPDATE eventos SET
                title=:title,
                description=:description,
                color=:color,
                textColor=:textColor,
                start=:start,
                end=:end
                WHERE ID=:ID
                ");

                $answer=$result->execute(array(
                    "ID"=>$_POST['id'],
                    "title" =>$_POST['title'],
                    "description" =>$_POST['description'],
                    "color" =>$_POST['color'],
                    "textColor" =>$_POST['textColor'],
                    "start" =>$_POST['start'],
                    "end" =>$_POST['end']
                ));
                echo json_encode($answer);
            break;
        default:
                $result = $conn->prepare("SELECT * FROM eventos");
                $result->execute();
                
                $show= $result->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($show);
                break;
    }

?>