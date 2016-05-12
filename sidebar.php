<html>
<body>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      

      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="somestyles.css"><meta http-equiv="refresh" content="2">
<form action="" method="post">
    <input type="hidden" name="action" value="submit" />
    <input id="submit" type="submit" name="submit" value="Leave Chat"> 
</form>
<a href='chatroomselect.php' target="_top">Go back</a></br>
</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
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
  $deletename = mysql_query($connect, "delete from userstatus where username = $username;");
  echo $deletename;
  
}



if($result = mysqli_query($connect,$_SESSION['users'])){
  while($row = mysqli_fetch_row($result)){
    echo $row['2'],'</br>';
  }
  mysqli_free_result($result);
}
$connect->close();

?>

