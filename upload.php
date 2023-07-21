
    <?php
    include 'header.php';
    include 'config.php';

    $idpost=$_GET["idpost"];

    $sql = "SELECT * FROM post WHERE id = $idpost";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (!isset($_SESSION['iduser']))
                echo 'Faça login para poder acessar esta página.';
            elseif (isset($_SESSION['iduser'])) {
                if ($_SESSION['iduser']==$row['iduser']) {   
    ?>

    <form class="form" action="bancodedados.php?acao=editar&idpost=<?=$row["id"]?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <h2>Editar postagem</h2>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Título</span>
            <input type="text" name="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?=$row["titulo"]?>">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagem de capa</label>
            <input type="submit" value="Upload Image" name="submit">
            <input class="form-control" name="imagem" type="file" name="fileToUpload" id="fileToUpload" value="<?=$row['imagem']?>">
        </div>
        <div class="input-group">
            <span class="input-group-text">Conteúdo</span>
            <textarea class="form-control" name="conteudo" aria-label="With textarea"><?=$row["conteudo"]?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar o post</button>
    </form>



                    <form action="bancodedados.php?acao=editar&idpost=<?=$row["id"]?>" method="POST">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="id" value="<?=$row["id"]?>">
                    <input type="text" name="titulo" value="<?=$row["titulo"]?>"><br><br>
                    <textarea class="caixatxt" name="conteudo"><?=$row["conteudo"]?></textarea><br><br>
                    <button type="submit">Salvar post</button>
                    </form>
    <?php
                } else
                    echo 'Você não possui permissão para editar este post.';
            }
        }
    }

    $conn->close();
    ?>
    <?php
    include 'footer.php';
    ?>


CERTO EDIT POST
<?php
include 'header.php';
include 'config.php';

$idpost=$_GET["idpost"];

$sql = "SELECT * FROM post WHERE id = $idpost";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (!isset($_SESSION['iduser']))
            echo 'Faça login para poder acessar esta página.';
        elseif (isset($_SESSION['iduser'])) {
            if ($_SESSION['iduser']==$row['iduser']) {   
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Selecione uma imagem para ser enviada:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<form class="form" action="bancodedados.php?acao=editar&idpost=<?=$row["id"]?>" method="post">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?=$row["id"]?>">
    <h2>Editar postagem</h2>
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Título</span>
        <input type="text" name="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?=$row["titulo"]?>">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Imagem de capa</label>
        <input class="form-control" name="imagem" type="file" id="formFile" value="<?=$row['imagem']?>">
    </div>  
    <div class="input-group">
        <span class="input-group-text">Conteúdo</span>
        <textarea class="form-control" name="conteudo" aria-label="With textarea"><?=$row["conteudo"]?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar o post</button>
</form>



                <form action="bancodedados.php?acao=editar&idpost=<?=$row["id"]?>" method="POST">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?=$row["id"]?>">
                <input type="text" name="titulo" value="<?=$row["titulo"]?>"><br><br>
                <textarea class="caixatxt" name="conteudo"><?=$row["conteudo"]?></textarea><br><br>
                <button type="submit">Salvar post</button>
                </form>
<?php
            } else
                echo 'Você não possui permissão para editar este post.';
        }
    }
}

$conn->close();
?>
<?php
include 'footer.php';
?>