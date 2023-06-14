<?php

$conn = new mysqli("localhost","root","lab123","blog");
// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
} //else echo "Sucesso";


/* $sql = "SELECT * FROM post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - titulo: " . $row["titulo"]. " " . $row["conteudo"]. "<br>";
 



}
} else {
  echo "0 results";
}
$conn->close(); */


?>

