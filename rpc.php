<?php

require_once("clientDB.php.inc");
$request = $_POST['request'];
$request = json_decode(file_get_contents("php://input"),true);
session_start();
$_SESSION['username']=$request['username'];
$response = "error unrecognized request<p>";
switch($request["request"])
{
    case "login":
	$username = $request['username'];
	$password = $request['password'];
	$login = new clientDB("connect.ini");
	$response = $login->validateClient($username,$password);
	if ($response['success']===true)
	{
		$response = "Login Successful!<p>";
		echo"<a href=chatroomselect.php>Click here to select a chatroom</a><br/>";
		echo"<a href=dataviews.html>Click here to check data</a><br/>";
	}
	else
	{
		$response = "Login Failed:".$response['message']."<p>";
	}
	break;
	
    case "register":
	$username = $request['username'];
	$password = $request['password'];
	$register = new clientDB("connect.ini");
	$response = $register->addNewClient($username,$password);
	if ($response['success']===true)
	{
		$response = "Registration Successful!<p>";
	}
	else
	{
		$response = "Registration Failed:".$response['message']."<p>";
		break;
	}
}

echo json_encode($response);
?>






