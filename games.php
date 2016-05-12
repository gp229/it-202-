<html>
<head>
<title>Sports</title>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      

      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="somestyles.css">
      
</head>
<FRAMESET cols="200,*">
  <FRAME src="sidebar.php">
  <FRAMESET rows="*,200">
    <FRAME src="messages.php">
    <FRAME src="sendmessage.php">
  </FRAMESET>
</FRAMESET>
<body>
script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
<?php
session_start();

$chatroom = '2';
$username = $_SESSION['username'];
$query = "SELECT * FROM messagetable Where chatroom = $chatroom;";
$userprint = "SELECT * FROM userstatus Where chatroom = $chatroom;";
$_SESSION['querytest'] = $query;
$_SESSION['chatroomnum'] = $chatroom;
$_SESSION['users'] = $userprint;
?>