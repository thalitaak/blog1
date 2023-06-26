<?php
include 'header.php';
include 'config.php';
?>

<form class="formulario" action="bancodedados.php?acao=inserir" method="post">
<input type="hidden" name="acao" value="inserir">
<div>
    <label for="titulopost">Título:</label>
    <input type="text" name="titulo" />
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