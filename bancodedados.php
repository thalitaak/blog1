<?php
include 'config.php';

$acao = $_GET['acao'];
switch ($acao) {
    case 'inserir':
        inserirPost($conn); 
        break;
    case 'editar':
        editarPost($conn);
        break;
    case 'excluir':
        excluirPost($conn);
        break;
}

function inserirPost($conn) {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $sql = "INSERT INTO post(titulo, conteudo) VALUES ('$titulo', '$conteudo')";
    $resultado = $conn->query($sql);
?>
    <meta http-equiv="refresh" content="0;url=/blog">
<?php
}

function editarPost($conn) {
    $idpost=$_GET["idpost"];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $sql = "UPDATE post SET titulo = '$titulo', conteudo = '$conteudo' WHERE id = $idpost";
    $resultado = $conn->query($sql);
?>
    <meta http-equiv="refresh" content="0;url=/blog/post.php?idpost=<?=$idpost?>">
<?php
}

function excluirPost($conn) {
    $idpost=$_GET["idpost"];
    $sql = "DELETE FROM post WHERE id=$idpost;";
    $resultado = $conn->query($sql);
?>
    <meta http-equiv="refresh" content="0;url=/blog">
<?php
}

?>