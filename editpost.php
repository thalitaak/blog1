<?php
include 'header.php';
include 'config.php';

$idpost=$_GET["idpost"];

$sql = "SELECT * FROM post WHERE id = $idpost";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
         
?>
         <form action="form_update.php" method="post">
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

<!-- <form action="form_update.php" method="post">
    
    <div>
            <label for="titulopost">Título:</label>
            <input type="text" name="titulo" />
        </div>
    
        <div>
            <label for="conteudopost">Conteúdo:</label>
            <textarea id="conteudopost" name="conteudo"></textarea>
        </div>
    
        <div class="button">
            <button type="submit">Enviar o post</button>
        </div>
    </form> -->



<?php
include 'footer.php';
?>