<html>
<body>
<?php
$connect = new mysqli('localhost', 'root', '6leirbag','it202');
if($connect->connect_error){
  die('Could not connect: ' . $connect->connect_error);
}
$query = "SELECT * FROM messagetable";
if($result = mysqli_query($connect,$query)){
  while($row = mysqli_fetch_row($result)){
    echo $row['4'],': ', $row['2'],'</br>';
  }
  mysqli_free_result($result);
}
$connect->close();
$url1=$_Server['REQUEST_URI'];
header("Refresh: 2; URL=$url1");
?>
</body>
</html>