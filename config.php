<?php

$conn = new mysqli("localhost","root","lab123","blog");
// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
} //else echo "Sucesso";


?>

