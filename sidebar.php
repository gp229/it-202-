<form action="" method="post">
    <input type="hidden" name="action" value="submit" />
    <input id="sports-submit" type="submit" name="submit" value="sports">
    <input id="chat-submit" type="submit" name="submit" value="games">
    <input id="chat-submit" type="submit" name="submit" value="news">
    <input id="chat-submit" type="submit" name="submit" value="off topic">
    <input id="chat-submit" type="submit" name="submit" value="helpdesk">
   
</form>
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

if($result = mysqli_query($connect,$_SESSION['users'])){
  while($row = mysqli_fetch_row($result)){
    echo $row['2'],'</br>';
  }
  mysqli_free_result($result);
}
$connect->close();

?>

