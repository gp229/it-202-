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
$username = $_SESSION['username'];
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
?>
