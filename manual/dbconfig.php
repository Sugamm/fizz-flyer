<?php
/*
* Author : Sugam Malviya
* code url : https://github.com/Sugamm/
*/
class Database
{
    //PDO Method
    private $host = "localhost";
    private $db_name = "fizzflyer";
    private $username = "root";
    private $password = "password";

    // private $host = "localhost";
    // private $db_name = "fizzflyer";
    // private $username = "root";
    // private $password = "password";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
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