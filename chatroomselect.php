<html>
      <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Project 2</title>

      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="somestyles.css">
      <body>
<p>Join a chatroom</p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
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
  $_SESSION['chatrum']= $chatwhich;
  header("Location: sports.php"); 
}
if($choose === "games"){
  $chatwhich = 2;
  $_SESSION['chatrum']= $chatwhich;
  header("Location: games.php");
}
if($choose === "news"){
  $chatwhich = 3;
  $_SESSION['chatrum']= $chatwhich;
  header("Location: news.php");
}
if($choose === "off topic"){
  $chatwhich = 4;
  $_SESSION['chatrum']= $chatwhich;
  header("Location: topic.php");
}
if($choose === "helpdesk"){
  $chatwhich = 5;
  $_SESSION['chatrum']= $chatwhich;
  header("Location: help.php");
}
$username= mysqli_real_escape_string($connect, $_SESSION['username']);
$userenter = "INSERT INTO userstatus(userid, chatroom, username) values (NULL, $chatwhich,'$username');";
$result = mysqli_query($connect, $userenter);
$connect->close();
}
?>