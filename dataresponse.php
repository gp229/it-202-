<?php
$request = $_POST['request'];
$request = json_decode(file_get_contents("php://input"),true);
$response = "error unrecognized request<p>";
switch($request["request"])
{
    case "All":
	$datab = parse_ini_file("connect.ini");
	$user = $datab['user'];
	$password = $datab['password'];
	$db = $datab['db'];
	$host = $datab['host'];
	$connect = new mysqli($host,$user, $password, $db);
	if($connect->connect_error){
	  die('Could not connect: ' . $connect->connect_error);
	}
	$query = "Select * FROM messagetable";
	if($result = mysqli_query($connect,$query)){
	  $x = array();
	  while($row = mysqli_fetch_row($result)){
	    	      $response=  $row['1']." ".$row['2']." ".$row['3']." ".$row['4'];
	    $x[] = $response;

	  }
	  mysqli_free_result($result);
	}
	$connect->close();
	break;
    
	
   case "Chat":
	$chatroom = $request['chatroom'];
	$datab = parse_ini_file("connect.ini");
	$user = $datab['user'];
	$password = $datab['password'];
	$db = $datab['db'];
	$host = $datab['host'];
	$connect = new mysqli($host,$user, $password, $db);
	if($connect->connect_error){
	  die('Could not connect: ' . $connect->connect_error);
	}
	$query = "Select * FROM messagetable where chatroom = $chatroom";
	if($result = mysqli_query($connect,$query)){
	  $x = array();
	  while($row = mysqli_fetch_row($result)){
	    	      $response=  $row['1']." ".$row['2']." ".$row['3']." ".$row['4'];
	    $x[] = $response;

	  }
	  mysqli_free_result($result);
	}
	$connect->close();
	break;
     case "Names":
	$username= $request['username'];
	$datab = parse_ini_file("connect.ini");
	$user = $datab['user'];
	$password = $datab['password'];
	$db = $datab['db'];
	$host = $datab['host'];
	$connect = new mysqli($host,$user, $password, $db);
	if($connect->connect_error){
	  die('Could not connect: ' . $connect->connect_error);
	}
	$username = "john";
	$query = "Select * FROM messagetable username  = $username;";
	if($result = mysqli_query($connect,$query)){
	  $x = array();
	  while($row = mysqli_fetch_row($result)){
	    $rows[] = array_map('utf8_encode', $row);
	    	      $response=  $row['1']." ".$row['2']." ".$row['3']." ".$row['4'];
	    $x[] = $response;

	  }
	  mysqli_free_result($result);
	}
	$connect->close();
	break;
    }
echo json_encode($x);


?>