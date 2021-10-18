<?php

Class Database{
 
	private $server = "mysql:host=localhost;dbname=hilandin_ra";
	private $username = "hilandin_ra";
	private $password = "hilandin_ra";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

$pdo = new Database();


$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = "hilandin_ra";
// Enter your MySQL password below
$password = "hilandin_ra";
$dbname = "hilandin_ra";

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conne->connect_error) {
    header("location:connection_error.php?error=$conn->connect_error");
    die($conne->connect_error);
}
 
?>