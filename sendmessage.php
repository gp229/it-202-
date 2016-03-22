<?php
session_start();
if(ISSET($_POST['message'])){
$connect = new mysqli('localhost', 'root', '6leirbag','it202');
if($connect->connect_error){
die('Could not connect: ' . $connect->connect_error);}


$message= mysqli_real_escape_string($connect, $_POST['message']);
$username= mysqli_real_escape_string($connect, $_SESSION['username']);
$sql = "INSERT INTO messagetable(messageid, chatroom, message, timestamp, username) values (NULL,1,'$message', current_timestamp, '$username');";

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