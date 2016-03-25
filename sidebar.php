<meta http-equiv="refresh" content="6">
<form action="" method="post">
    <input type="hidden" name="action" value="submit" />
    <input id="submit" type="submit" name="submit" value="Leave Chat"> 
</form>
<?php
session_start();

$chatting = $_SESSION['chatrum'];
$username = $_SESSION['username'];
$datab = parse_ini_file("connect.ini");
$user = $datab['user'];
$password = $datab['password'];
$db = $datab['db'];
$host = $datab['host'];

$connect = new mysqli($host,$user, $password, $db);
if($connect->connect_error){
  die('Could not connect: ' . $connect->connect_error);
}

if (isset($_POST['action'])){
  $deletename ="delete from userstatus where username = '$username';";
  echo $deletename;
  $connect->close();
}



if($result = mysqli_query($connect,$_SESSION['users'])){
  while($row = mysqli_fetch_row($result)){
    echo $row['2'],'</br>';
  }
  mysqli_free_result($result);
}
$connect->close();

?>

