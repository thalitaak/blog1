<?php
include 'config.php';

$idpost=$_GET["idpost"];
$sql = "DELETE FROM post WHERE id=$idpost;";
$resultado = $conn->query($sql);

?>

<meta http-equiv="refresh" content="0;url=/blog">