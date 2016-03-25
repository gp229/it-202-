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
		$response ="Login successful";
		echo"<a href=chatroomselect.php>Click here to select a chatroom</a><br/>";
				
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
