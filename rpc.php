<?php

require_once("clientDB.php.inc");

$request = $_POST['request'];
$response = "Not working<p>";
session_start();
$_SESSION['username']=$_POST['username'];
switch($request)
{
    case "login":
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = new clientDB("connect.ini");
	$response = $login->validateClient($username,$password);
	if ($response['success']===true)
	{
		$response ="";
		?>

		<p>Join a chatroom</p>
		<a href=sports.php>Sports</a><br/>
		<a href=games.php>Video Games</a><br/>
		<a href=news.php>News</a><br/>
		<a href=topic.php>Off Topic</a><br/>
		<a href=help.php>Helpdesk</a><br/><br/>
		<?php
				
	}
	else
	{
		$response = "Login Failed:".$response['message']."<p>";
		echo"<a href=index.html>Return to login</a><br/>";
	}
	break;
	
    case "register":
	$username = $_POST['username'];
	$password = $_POST['password'];
	$register = new clientDB("connect.ini");
	$response = $register->addNewClient($username,$password);
	if ($response['success']===true)
	{
		$response = "Registration Successful!<p>";
		echo"<a href=index.html>Return to login</a><br/>";
	}
	else
	{
		$response = "Registration Failed:".$response['message']."<p>";	
		echo"<a href=index.html>Return to login</a><br/>";
		break;
	}
}

echo $response;


?>
