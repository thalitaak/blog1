<?php
include 'config.php';

$idpost= $_POST['id'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$sql = "UPDATE post SET titulo = '$titulo', conteudo = '$conteudo' WHERE id = $idpost";
$resultado = $conn->query($sql);

?>

<meta http-equiv="refresh" content="0;url=/blog/post.php?idpost=<?=$idpost?>">