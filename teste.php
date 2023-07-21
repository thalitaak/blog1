<h1>Nome do blog</h1>

  <nav>
    <ul>
      <li><a href="/blog">Início</a></li>
      <li><a href="/blog/main.php">Admin</a></li>
      <?php
        session_start();
        if(isset($_SESSION['iduser'])===true) {
          echo '<li><a href="bancodedados.php?acao=logout">Sair</a></li>';
        }
        ?>
    </ul>
  </nav>

  <p style="text-align: center;"><a href="post.php?idpost=<?=$row["id"]?>"><?=$row["titulo"]?></a></p>

  <form class="formulario" action="bancodedados.php?acao=comentar&idpost=<?=$idpost?>" method="post">
    <h3>Faça um comentário:</h3>      <!-- Formulario de comentario ANTIGO -->
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

<!-- formulario edicao de post -->

 <form action="bancodedados.php?acao=editar&idpost=<?=$row["id"]?>" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?=$row["id"]?>">
    <input type="text" name="titulo" value="<?=$row["titulo"]?>"><br><br>
    <textarea class="caixatxt" name="conteudo"><?=$row["conteudo"]?></textarea><br><br>
    <button type="submit">Salvar post</button>
  </form>