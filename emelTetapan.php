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

if (isset($_GET['ahli_idh'])) {
      include('connection.php');
      $ahli_idh = $_GET['ahli_idh'];
      $sql = "SELECT * FROM ahli 
      WHERE ahli_id='$ahli_idh'";
      $statement = $conn->prepare($sql);
      $statement->execute(array(":ahli_id"=>$ahli_idh));
      $ahliRow=$statement->fetch(PDO::FETCH_ASSOC);
      $ahli_nama = $ahliRow['ahli_nama'];
      $ahli_emel = $ahliRow['ahli_emel'];

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
$mail->AddAddress("$ahli_emel");
$mail->Subject = "Jemputan ke $title ";

    // Include php file Starts here
    ob_start();
    include "emelMesy.php";
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