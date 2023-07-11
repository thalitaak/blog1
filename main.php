<?php
include 'header.php';
include 'config.php';
include 'footer.php';

if (!isset($_SESSION['iduser'])) { // verifica se a sessao iduser esta definida
  header("Location: /blog/admin_login.php"); // se nao tiver, direciona para o login
}

$iduser = $_SESSION['iduser'];
$sql = "SELECT * FROM post WHERE iduser = $iduser";
$result = $conn->query($sql);
?>
<h3 style="text-align:center";>Olá, <?=$_SESSION['login']?>!</h3>
<div class="quadroposts"><h2 style="text-align: left;">Gerenciamento de conteúdo</h2>
<p style="text-align: right;"><a href="/blog/formulario.php"><div class="criarpost">Criar novo post</div></a></p>
<?php
if ($result->num_rows > 0) {     // Mostra os posts do usuario
  while($row = $result->fetch_assoc()) { ?>
    <p><a href="post.php?idpost=<?=$row["id"]?>"><?=$row["titulo"]?></a> 
    
<a href="editpost.php?idpost=<?=$row["id"]?>"><img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" height="18" width="18"></a>     <!-- Botao para editar post -->
<img src="https://cdn-icons-png.flaticon.com/512/2214/2214017.png" height="18" width="18" onclick="alertDeletePost()" style="cursor: pointer;"></p>      <!-- Botao para excluir post -->

<script>
  function alertDeletePost() {       // Funcao que confirma exclusao do post 
    if (confirm('Tem certeza que deseja excluir esta postagem?') == true)
      window.location.href = "bancodedados.php?acao=excluir&idpost=<?=$row["id"]?>";
  }
</script>

  <?php }
} else 
    echo 'Quando você criar novos posts, eles aparecerão aqui.';
?>
</div>