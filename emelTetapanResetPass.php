<?php

if (isset($_GET['email'])) {
    include('connection.php');
    $user_email = $_GET['email'];
    $sql = "SELECT * FROM users 
    WHERE user_email='$user_email'";
    $statement = $conn->prepare($sql);
    $statement->execute(array(":mesy_id"=>$ID));
    $userRow=$statement->fetch(PDO::FETCH_ASSOC);

} else {
  header('Location: index.php');
}

if (isset($_GET['pass'])) {
      include('connection.php');
      $pass = $_GET['pass'];

      $resetPassLink = 'http://mytask.mbi.gov.my/ejadualv1/resetPassword.php?fp_code='.$pass.'';
}


require("./PHPMailer/PHPMailerAutoload.php");
$user_name = $userRow['user_name'];

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
$mail->AddAddress("$user_email");
$mail->Subject = "Menetapkan Semula Kata Laluan";

    // Include php file Starts here
    ob_start();
    include "emelResetPass.php";
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
      echo "<script type='text/javascript'>alert('Sila semak emel anda, kami telah menghantar pautan ke emel yang telah anda daftar.');
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