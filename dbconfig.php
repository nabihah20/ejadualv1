<?php
class Database
{   
    private $db_server = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_database = "ejadual";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->db_server . ";dbname=" . $this->db_database, $this->db_username, $this->db_password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>