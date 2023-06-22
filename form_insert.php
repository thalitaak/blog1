<?php
include 'config.php';

$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$sql = "INSERT INTO post(titulo, conteudo) VALUES ('$titulo', '$conteudo')";
$resultado = $conn->query($sql);

?>

<meta http-equiv="refresh" content="0;url=/blog">