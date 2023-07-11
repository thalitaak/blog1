<?php
include 'header.php';
include 'config.php';
include 'footer.php';
?>

<form class="formlogin" action="bancodedados.php?acao=login" method="post">
    <h2>Login / Área administrativa</h2>
    <p style="text-align:center">Digite os dados de acesso nos campos abaixo.</p>
    <div>
        <label for="login">Usuário:</label>
        <input type="text" name="login" />
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" />
    </div>
    <div class="button">
        <button type="submit" style="text-align:center;">Acessar</button>
    </div>
</form>