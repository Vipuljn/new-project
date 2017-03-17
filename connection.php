<?php
$servername="127.0.0.1";
$username="root";
$password="";
$database="drdo";

$conn= new mysqli($servername,$username,$password,$database); 
if ($conn->connect_error) 
  { 
  die("Could not connect: " . $conn->connect_error); 
  } 
 //echo "connected successfully";
//$conn->close();
?>



