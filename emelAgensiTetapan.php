<?php

if (isset($_GET['ID'])) {
    include('connection.php');
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM mesy 
    WHERE mesy_id='$ID'";
    $statement = $conn->prepare($sql);
    $statement->execute(array(":mesy_id"=>$ID));
    $mesyRow=$statement->fetch(PDO::FETCH_ASSOC);

} else {
  header('Location: index.php');
}

if (isset($_GET['agensi_idh'])) {
    include('connection.php');
    $agensi_idh = $_GET['agensi_idh'];
    $sql = "SELECT * FROM agensi 
    WHERE agensi_id='$agensi_idh'";
    $statement = $conn->prepare($sql);
    $statement->execute(array(":agensi_id"=>$agensi_idh));
    $agensiRow=$statement->fetch(PDO::FETCH_ASSOC);
    $agensi_nama = $agensiRow['agensi_nama'];
    $agensi_emel = $agensiRow['agensi_emel'];
    $agensi_id = $agensiRow['agensi_id'];
  
  }

require("./PHPMailer/PHPMailerAutoload.php");
$title = $mesyRow['title'];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML(true);
$mail->Username = 'bihatq@gmail.com';
$mail->Password = 'terbilang';
$mail->setFrom("ejadualv1.mbi@gmail.com", "eJadual MBI ver 1");
$mail->AddAddress("$agensi_emel");
$mail->Subject = "Jemputan ke $title ";

    // Include php file Starts here
    ob_start();
    include "emelAgensiMesy.php";
    $message = ob_get_clean();
    $mail->msgHTML($message);        
    // Include php file Ends here

  if(!$mail->Send()) {
    // Message if mail has been not sent
    echo "<script type='text/javascript'>alert('Penghantaran emel tidak berjaya.');
    window.location='home.php';
    </script>";
    }
    // Message if mail has been sent
    else {
      echo "<script type='text/javascript'>alert('Penghantaran emel berjaya dihantar.');
      window.location='profil.php';
      </script>";
    }

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 