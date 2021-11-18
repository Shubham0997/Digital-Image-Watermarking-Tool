<?php



session_start();
$username=$_SESSION['X'];

chdir("G:/xampp/htdocs/Digital Watermarking Tool/$username/Encryption");

unlink('Encoded.jpg'); 

unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:Sign_In.php");
?>