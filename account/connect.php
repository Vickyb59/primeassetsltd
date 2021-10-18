<?php
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
