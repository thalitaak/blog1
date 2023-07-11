<?php
include 'header.php';
include 'config.php';

//session_start(); // inicia/retoma sessao
if (!isset($_SESSION['iduser'])) { // verifica se a sessao iduser esta definida
    header("Location: /blog/admin_login.php"); // se nao tiver, direciona para o login
  }
  $iduser=$_SESSION['iduser'];
?>

<form class="form" action="bancodedados.php?acao=inserir" method="post">
    <input type="hidden" name="iduser" value="<?=$iduser?>">
    <h2>Criar postagem</h2>
    <div>
        <label for="titulopost">Título:</label>
        <input type="text" name="titulo"/>

    </div>
    <div>
        <label for="conteudopost">Conteúdo:</label>
        <textarea class="caixatxt" id="conteudopost" name="conteudo"></textarea>
    </div>
    <div class="button">
        <button type="submit">Enviar o post</button>
    </div>
</form>

<?php
include 'footer.php';
?>