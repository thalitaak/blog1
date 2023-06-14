<?php
include 'header.php';
include 'config.php';
?>

<?php
$sql = "SELECT * FROM post";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {      
?>
  
    <p style="text-align: center;"><a href="post.php?idpost=<?=$row["id"]?>"><?=$row["titulo"]?></a></p>

<?php 
        }  
    }
 /*else {
  echo "0 results";
}*/
$conn->close();
?>
    
<?php
    include 'footer.php';
?>