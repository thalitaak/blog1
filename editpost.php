<?php
include 'header.php';
include 'config.php';

$idpost=$_GET["idpost"];

$sql = "SELECT * FROM post WHERE id = $idpost";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
         
?>
         <form action="bancodedados.php?acao=editar&idpost=<?=$row["id"]?>" method="POST">
         <input type="hidden" name="acao" value="editar">
         <input type="hidden" name="id" value="<?=$row["id"]?>">
         <input type="text" name="titulo" value="<?=$row["titulo"]?>"><br><br>
         <textarea class="caixatxt" name="conteudo"><?=$row["conteudo"]?></textarea><br><br>
         <button type="submit">Salvar post</button>
       </form>
<?php
    }
}
$conn->close();
?>

<?php
include 'footer.php';
?>