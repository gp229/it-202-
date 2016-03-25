<p>Join a chatroom</p>
<form action="" method="post">
    <input type="hidden" name="action" value="submit" />
    <input id="sports-submit" type="submit" name="submit" value="sports">
    <input id="games-submit" type="submit" name="submit" value="games">
    <input id="news-submit" type="submit" name="submit" value="news">
    <input id="topic-submit" type="submit" name="submit" value="off topic">
    <input id="help-submit" type="submit" name="submit" value="helpdesk">
   
</form>

<?php
if (isset($_POST['action'])){
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
$choose = $_POST['submit'];
if($choose === "sports"){
  $chatwhich = 1;
  header("Location: sports.php"); 
}
if($choose === "games"){
  $chatwhich = 2;
  header("Location: games.php");
}
if($choose === "news"){
  $chatwhich = 3;
  header("Location: news.php");
}
if($choose === "off topic"){
  $chatwhich = 4;
  header("Location: topic.php");
}
if($choose === "helpdesk"){
  $chatwhich = 5;
  header("Location: help.php");
}
$username= mysqli_real_escape_string($connect, $_SESSION['username']);
$userenter = "INSERT INTO userstatus(userid, chatroom, username) values (NULL, $chatwhich,'$username');";
$result = mysqli_query($connect, $userenter);
$connect->close();
}
?>