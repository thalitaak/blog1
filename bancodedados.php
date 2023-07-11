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
    $conteudo = $_POST['conteudo'];
    $iduser = $_POST['iduser'];
    $sql = "INSERT INTO post(titulo, iduser, conteudo) VALUES ('$titulo', '$iduser', '$conteudo');";
    $resultado = $conn->query($sql);
?>
    <meta http-equiv="refresh" content="0;url=/blog">
<?php
}

function editarPost($conn) {
    $idpost=$_GET["idpost"];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $sql = "UPDATE post SET titulo = '$titulo', conteudo = '$conteudo' WHERE id = $idpost";
    $resultado = $conn->query($sql);
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
    //if(isset($_SESSION['iduser'])){
        session_start();
        session_destroy();
        //unset($_SESSION['iduser']);
    //}
    header("Location: /blog/");
    exit();
}

?>