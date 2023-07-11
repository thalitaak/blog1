<html>

<head>
<title>Blog</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<link rel="stylesheet" type="text/css" href="img1.png">
</head>

<body>
  <nav>
    <ul>
      <li><a href="/blog">Início</a></li>
      <li><a href="/blog/main.php">Admin</a></li>
      <?php
        session_start();
        if(isset($_SESSION['iduser'])===true) { // Verifica se o usuário está logado
          echo '<li><a href="bancodedados.php?acao=logout">Sair</a></li>'; // Se estiver logado, exibe o link de logout
        }
        ?>
    </ul>
  </nav>
  <h1>Nome do blog</h1>

</body>
</html>