<?php
include 'config.php';

$acao = $_GET['acao'];
switch ($acao) {
    case 'inserir':
        inserirPost($conn); 
        break;
    case 'editar':
        editarPost($conn);
        break;
    case 'excluir':
        excluirPost($conn);
        break;
    case 'comentar':
        inserirComentario($conn);
        break;
    case 'login':
        fazerLogin($conn);
        break;
    case 'logout':
        logout($conn);
        break;
}

function inserirPost($conn) {
    $titulo = $_POST['titulo'];
    $iduser = $_POST['iduser'];
    $conteudo = $_POST['conteudo'];
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se um arquivo de imagem foi enviado
        if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            // Define o diretório de destino para salvar a imagem
            $diretorioDestino = "uploads/";

            // Gera um nome único para o arquivo de imagem
            $nomeArquivo = uniqid() . "_" . $_FILES["imagem"]["name"];

            // Move o arquivo temporário para o diretório de destino
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorioDestino . $nomeArquivo)) {
                // O arquivo de imagem foi enviado com sucesso

                // Agora você pode salvar o caminho da imagem no banco de dados ou fazer qualquer outra manipulação necessária
                
                // Exemplo de como salvar o caminho da imagem em uma variável
                $camImagem = $diretorioDestino . $nomeArquivo;
                $sql = "INSERT INTO post(titulo, imagem, iduser, conteudo) VALUES ('$titulo', '$camImagem', '$iduser', '$conteudo');";
                $resultado = $conn->query($sql);
                // Agora você pode usar a variável $caminhoImagem para fazer o que precisa no banco de dados
            } else {
                // Ocorreu um erro ao mover o arquivo
                echo "Erro ao enviar a imagem.";
            }
        }
    }

?>
    <meta http-equiv="refresh" content="0;url=/blog">
<?php
}

function editarPost($conn) {
    $idpost=$_GET["idpost"];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
     // Verifica se o formulário foi enviado
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se um arquivo de imagem foi enviado
        if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            // Define o diretório de destino para salvar a imagem
            $diretorioDestino = "uploads/";

            // Gera um nome único para o arquivo de imagem
            $nomeArquivo = uniqid() . "_" . $_FILES["imagem"]["name"];

            // Move o arquivo temporário para o diretório de destino
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorioDestino . $nomeArquivo)) {
                // O arquivo de imagem foi enviado com sucesso
                // Agora você pode salvar o caminho da imagem no banco de dados ou fazer qualquer outra manipulação necessária
                // Exemplo de como salvar o caminho da imagem em uma variável
                $camImagem = $diretorioDestino . $nomeArquivo;
                $sql = "UPDATE post SET titulo = '$titulo', imagem = '$camImagem', conteudo = '$conteudo' WHERE id = $idpost";
                $resultado = $conn->query($sql);
                // Agora você pode usar a variável $caminhoImagem para fazer o que precisa no banco de dados
            } else {
                // Ocorreu um erro ao mover o arquivo
                echo "Erro ao enviar a imagem.";
            }
        }
    }
?>
    <meta http-equiv="refresh" content="0;url=/blog/post.php?idpost=<?=$idpost?>">
<?php
}

function excluirPost($conn) {
    $idpost=$_GET["idpost"];
    $sql = "DELETE FROM post WHERE id=$idpost;";
    $resultado = $conn->query($sql);
?>
    <meta http-equiv="refresh" content="0;url=/blog">
<?php
}

function inserirComentario($conn) {
    $idpost=$_GET["idpost"];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $comentario = $_POST['comentario'];
    $sql = "INSERT INTO comentarios (idpost, nome, email, comentario) VALUES ($idpost, '$nome', '$email', '$comentario')";
    $resultado = $conn->query($sql);
?>
    <meta http-equiv="refresh" content="0;url=/blog/post.php?idpost=<?=$idpost?>">
<?php
}

function fazerLogin($conn) {
    $login=$_POST['login'];
    $senha=$_POST['senha'];
    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha';";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0) { //se os dados estiverem incorretos emite alerta
        ?> <script>
        loginNaoEncontrado();
        function loginNaoEncontrado() {
          alert("Login e/ou senha incorreta. Tente novamente.");
          window.location.href = "/blog/admin_login.php";
        } </script> <?php
    } else {  //senão, inicia sessao:
        $row = $result->fetch_assoc();
        $iduser= $row["id"];
        session_start(); // função que inicia/retoma sessão
        
        if (!isset($_SESSION['iduser'])) { // verifica se a variavel de sessao iduser ja esta definida
            $_SESSION['iduser'] = $iduser;
            $_SESSION['login'] = $row["login"];
        }

       header("Location: /blog/main.php?iduser=$iduser");
    }
}

function logout($conn) {
    session_start();
    session_destroy();
    header("Location: /blog/");
    exit();
}

?>