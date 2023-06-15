<?php
include 'header.php'; // Inclui o conteúdo do arquivo "header.php"

$titulo="<h2>Título post 1</h2>";
$conteudo='<img class="user-photo" src="img/img1.png" style="width:900px; display: block; margin-left: auto; margin-right: auto;">
<p>Início do conteúdo 1: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h3>Where does it come from?</h3>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>';

$titulo2="<h2>Título post 2</h2>";
$conteudo2='<img class="user-photo" src="img/img2.png" style="width:900px; display: block; margin-left: auto; margin-right: auto;">
<p>Início do conteúdo 2: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h3>Where does it come from?</h3>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>';

$titulo3="<h2>Título post 3</h2>";
$conteudo3='<img class="user-photo" src="img/img3.jpg" style="width:900px; display: block; margin-left: auto; margin-right: auto;">
<p>Início do conteúdo 3: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h3>Where does it come from?</h3>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>';

$titulo4="<h2>Título post 4</h2>";
$conteudo4='<img class="user-photo" src="img/img4.jpg" style="width:900px; display: block; margin-left: auto; margin-right: auto;">
<p>Iniício do conteúdo 4: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h3>Where does it come from?</h3>
<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>';

$idpost=$_GET["idpost"];

/*$post1 = array(
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
            echo $postagens[$i]; }
    } */

$postagens = array(
    array(
        'id' => 1,
        'titulo' => $titulo,
        'conteudo' => $conteudo
    ),
    array(
        'id' => 2,
        'titulo' => $titulo2,
        'conteudo' => $conteudo2
    ),
    array(
        'id' => 3,
        'titulo' => $titulo3,
        'conteudo' => $conteudo3
    ),
    array(
        'id' => 4,
        'titulo' => $titulo4,
        'conteudo' => $conteudo4
    )
);
    
foreach ($postagens as $postagem) {
// print_r($postagem); // 
// echo "id antes do if:" . $postagem['id'];
    if ($idpost == $postagem['id']) {
        echo $postagem['titulo'] . '<br>' . $postagem['conteudo'];
    }
}

include 'footer.php'; // Inclui o conteúdo do arquivo "footer.php"

?>