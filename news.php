<html>
<head>
<title>Sports</title>
</head>
<FRAMESET cols="200,*">
  <FRAME src="sidebar.php">
  <FRAMESET rows="*,200">
    <FRAME src="messages.php">
    <FRAME src="sendmessage.php">
  </FRAMESET>
</FRAMESET>

</html>
<?php
session_start();
$chatroom = '3';
$username = $_SESSION['username'];
$query = "SELECT * FROM messagetable Where chatroom = $chatroom;";
$userprint = "SELECT * FROM userstatus Where chatroom = $chatroom;";
$_SESSION['querytest'] = $query;
$_SESSION['chatroomnum'] = $chatroom;
$_SESSION['users'] = $userprint;
?>
