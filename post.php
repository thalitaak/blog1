<?php
include 'header.php';
include 'config.php';

$idpost=$_GET["idpost"];

$sql = "SELECT * FROM post WHERE id = $idpost";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) { ?> 
    <h2> <?=$row["titulo"]?> </h2>  <!-- Imprimindo o post -->
    <img style="height: 400px;" src="<?=$row['imagem']?>">
    <?php
    echo nl2br("\n"), $row["conteudo"], nl2br("\n"), nl2br("\n");
    if (isset($_SESSION['iduser'])) { // Para exibir botoes de editar/excluir post
      if ($_SESSION['iduser']==$row['iduser']) {
    ?>

    <a href="editpost.php?idpost=<?=$idpost?>"><button type="button" class="btn btn-secondary btn-sm">Editar</button></a>     <!-- Botao para editar post -->
    <button type="button" class="btn btn-secondary btn-sm" onclick="alertDeletePost()">Excluir</button></p>      <!-- Botao para excluir post -->
    <script>
    function alertDeletePost() {       // Funcao que confirma exclusao do post 
      if (confirm('Tem certeza que deseja excluir esta postagem?') == true)
        window.location.href = "bancodedados.php?acao=excluir&idpost=<?=$idpost?>";
    }
    </script>
    <?php
      }
    }
  }
}


    ?>
<div class="secaocomentarios" style="background-color: #d3d3d3;
  margin: 20px;
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;">
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
      <h3>Faça um comentário:</h3>      <!-- Formulario de comentario NOVO -->
      <input type="hidden" name="post" value="<?=$idpost?>">
      <input type="hidden" name="acao" value="comentar">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="comentario" class="form-label">Comentario</label>
        <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
  Enviar comentário
</button>
  </form>
  </div>

<?php
$conn->close();
?>

<?php
include 'footer.php';
?>