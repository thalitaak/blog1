<html>
<head>
<title>Post</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1><nomeblog><b>Nome do blog</b></nomeblog> </h1>

<!-- Conteúdo -->

<p style="text-align: center;">Bem vindo! Este é um blog teste.</p>
<img src="https://veolink.com.br/wp-content/uploads/2021/05/24-1.jpg" style="width:900px; display: block; margin-left: auto; margin-right: auto;">

<?php
$titulo="<h2>Título post 1</h2>";
$conteudo='<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h3>Where does it come from?</h3>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>';

$titulo2="<h2>Título post 2</h2>";
$conteudo2='<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h3>Where does it come from?</h3>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>';

$idpost=$_GET["idpost"];

$post1 = array(
    1 => $titulo,
    2 => $conteudo
);
$post2 = array(
    1 => $titulo2,
    2 => $conteudo2
);

$postagens = array($post1, $post2);

    for ($i=0; $i<=count($postagens); $i++) {
        if($idpost==$i+1) {
            print_r ($postagens[$i]); }
    }
?>

<footer>
    <p>Rodapé da página</p>
  </footer>
</body>
</html>