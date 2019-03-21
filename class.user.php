<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($user_id,$user_name,$user_email,$user_pass,$user_type)
	{
		try
		{
			$new_password = password_hash($user_pass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_id,user_name,user_email,user_pass,user_type) 
		                                               VALUES(:user_id, :user_name, :user_email, :user_pass, :user_type)");
												  
			$stmt->bindparam(":user_id", $user_id);
			$stmt->bindparam(":user_name", $user_name);
			$stmt->bindparam(":user_email", $user_email);
			$stmt->bindparam(":user_type", $user_type);
			$stmt->bindparam(":user_pass", $new_password);	
		
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($user_id,$user_email,$user_pass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, user_id, user_name, user_email, user_pass, user_type FROM users WHERE user_id=:user_id OR user_email=:user_email ");
			$stmt->execute(array(':user_id'=>$user_id, ':user_email'=>$user_email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($user_pass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>