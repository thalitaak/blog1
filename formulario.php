<?php
include 'header.php';
include 'config.php';

//session_start(); // inicia/retoma sessao
if (!isset($_SESSION['iduser'])) { // verifica se a sessao iduser esta definida
    header("Location: /blog/admin_login.php"); // se nao tiver, direciona para o login
  }
  $iduser=$_SESSION['iduser'];
?>




<form class="form" action="bancodedados.php?acao=inserir" method="post" enctype="multipart/form-data">
    <input type="hidden" name="iduser" value="<?=$iduser?>">
    <h2>Criar postagem</h2>
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Título</span>
        <input type="text" name="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Imagem de capa</label>
        <input class="form-control" name="imagem" type="file" id="fileToUpload">
    </div>  
    <div class="input-group">
        <span class="input-group-text">Conteúdo</span>
        <textarea class="form-control" name="conteudo" aria-label="With textarea"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar o post</button>
</form>

    <!--<form class="form" action="bancodedados.php?acao=inserir" method="post">
        <input type="hidden" name="iduser" value="variavel do iduser php">
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
    </form>-->

<?php
include 'footer.php';
?>