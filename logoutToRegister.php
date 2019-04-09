<?php
	require_once('session.php');
	require_once('class.user.php');
	$user_logout = new USER();
	
	//if($user_logout->is_loggedin()!="")
	//{
        //$user_logout->redirect('index.php');
        
	//}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
        $user_logout->doLogout();
        header('Refresh:0; url=register.php');
        echo "<script type='text/javascript'>alert('Anda telah daftar keluar dan akan diarahkan ke halaman Daftar Masuk');
        </script>";
	}

	