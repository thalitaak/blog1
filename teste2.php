<html>

<head>
<title>Blog</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-2" style="padding-top: 15px; position: fixed; top: 0; bottom: 0; left: 0; background-color: #272727; color: #e4e4e4; text-align: left;">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" style="color= #fff;" href="/blog/teste2.php" role="button">Início</a>
            <a class="btn btn-primary" href="/blog/main.php" role="button">Admin</a>
            <?php
                session_start();
                if(isset($_SESSION['iduser'])===true) {
                echo '<a class="btn btn-primary" href="bancodedados.php?acao=logout" role="button">Sair</a>';
                }
                ?>
        </div>
    </div>

    <div class="col-10 offset-2">
        <h1>Hello, world!</h1>

        <div id="carouselExampleAutoplaying" class="carousel slide h-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height: 400px; object-fit: cover;" src="assets/img/img1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img style="height: 400px; object-fit: cover;" src="assets/img/img2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img style="height: 400px; object-fit: cover;" src="assets/img/img3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row align-items-center m-1">
    <?php
    function criaResumo($string,$caracteres) { 
      $string = strip_tags($string); 
      if (strlen($string) > $caracteres) { 
        while (substr($string,$caracteres,1) <> ' ' && ($caracteres < strlen($string))) { 
          $caracteres++; }; 
      }; 
      return substr($string,0,$caracteres) . '...'; 
    }
    $sql = "SELECT * FROM post";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $texto = $row['conteudo'];   
  ?>
        <div class="col">
          <div class="card" style="width: 18rem; height: 20%; ">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?=$row["titulo"]?></h5>
              <p class="card-text"><?=criaResumo($texto, 200)?></p>
              <a href="post.php?idpost=<?=$row["id"]?>" class="btn btn-primary">Continue lendo</a>
            </div>
          </div>
        </div>
  <?php 
      }  
    } else {
      echo "0 results";
      }
  $conn->close();
  ?>
</div>

    </div>
  </div>
</div>



  </body>
</html>