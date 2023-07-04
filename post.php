<?php
include 'header.php';
include 'config.php';

$idpost=$_GET["idpost"]; 

$sql = "SELECT * FROM post WHERE id = $idpost";      // Imprimindo o post
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row["titulo"], nl2br("\n"), $row["conteudo"], nl2br("\n"), nl2br("\n");
  }
}
?>

<p style="text-align: center;">
<a href="editpost.php?idpost=<?=$idpost?>"><button>Editar post</button></a>     <!-- Botao para editar post -->
<button onclick="alertDeletePost()">Excluir post</button>       <!-- Botao para excluir post -->
</p>

<script>
  function alertDeletePost() {       // Funcao que confirma exclusao do post 
    if (confirm('Tem certeza que deseja excluir esta postagem?') == true)
      window.location.href = "bancodedados.php?acao=excluir&idpost=<?=$idpost?>";
  }
</script>

<div class="secaocomentarios">
  <h2>Comentários:</h2>
    <?php
    $sql = "SELECT * FROM comentarios WHERE idpost = $idpost";      // Imprimindo comentarios referentes ao post
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?><div class="comentario"><?php
        echo nl2br("\n"), $row["data"], nl2br("\n"), $row["nome"], nl2br("\n"), $row["comentario"], nl2br("\n"), nl2br("\n");
        ?></div><?php
      }
    } else
        echo 'Ainda não há comentários. Seja o primeiro!', nl2br("\n"), nl2br("\n");
    
    ?>
  <form class="formulario" action="bancodedados.php?acao=comentar&idpost=<?=$idpost?>" method="post">
    <h3>Faça um comentário:</h3>      <!-- Formulario de comentario -->
    <input type="hidden" name="post" value="<?=$idpost?>">
    <input type="hidden" name="acao" value="comentar">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" />
    </div>
    <div>
      <label for="e-mail">E-mail:</label>
      <input type="text" name="email" />
    </div>
    <div>
      <label for="comentario">Comentário:</label>
      <textarea class="caixacoment" id="comentario" name="comentario"></textarea>
    </div>
    <div class="button">
      <button type="submit">Enviar comentário</button>
    </div>
  </form>
</div>

<?php
$conn->close();
?>

<?php
include 'footer.php';
?>