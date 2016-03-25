<html>
<head>
<meta http-equiv="refresh" content="2">
</head>

</html>
<?php
session_start();
$datab = parse_ini_file("connect.ini");
$user = $datab['user'];
$password = $datab['password'];
$db = $datab['db'];
$host = $datab['host'];
$connect = new mysqli($host,$user, $password, $db);
if($connect->connect_error){
  die('Could not connect: ' . $connect->connect_error);
}

if($result = mysqli_query($connect,$_SESSION['querytest'])){
  while($row = mysqli_fetch_row($result)){
    echo $row['4'],': ', $row['2'],'</br>';
  }
  mysqli_free_result($result);
}
$connect->close();

?>
