<?php
session_start();
$datab = parse_ini_file("connect.ini");
$user = $datab['user'];
$password = $datab['password'];
$db = $datab['db'];
$host = $datab['host'];

if(ISSET($_POST['message'])){
$connect = new mysqli($host,$user, $password, $db);
if($connect->connect_error){
die('Could not connect: ' . $connect->connect_error);}

$chatroomnum= mysqli_real_escape_string($connect, $_SESSION['chatroomnum']);
$message= mysqli_real_escape_string($connect, $_POST['message']);
$username= mysqli_real_escape_string($connect, $_SESSION['username']);
$sql = "INSERT INTO messagetable(messageid, chatroom, message, timestamp, username) values (NULL, $chatroomnum,'$message', current_timestamp, '$username');";

$result = mysqli_query($connect, $sql);
$connect->close();
}
echo '<html>';
echo '<head></head><body>';
echo '<form action="sendmessage.php" method="POST">';
echo '<input type="text" name="message" />';
echo '<input type="submit" value="submit" name="Submit"/>';
echo '</form>';
echo '</body></html>';
?>