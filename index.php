<?php
include 'header.php';
include 'config.php';
?>

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

<div class="container text-center">
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
          <div class="card card-sm d-grid" style="width: 18rem; min-height: 300px;">
            <img src="<?=$row["imagem"]?>" class="card-img-top" alt="imagemcapa">
            <div class="card-body flex-fill">
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
<?php
  include 'footer.php';
?>