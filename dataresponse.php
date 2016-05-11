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
	$query = "Select * FROM clients;";
	if($result = mysqli_query($connect,$query)){
	  while($row = mysqli_fetch_row($result)){
	      $response =  $row['2'];//,$row['2']$row['3'], $row['4'],'</br>';
	  }
	  mysqli_free_result($result);
	}
	$connect->close();
	break;
    }
	
   /* case "register":
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
	*/
//}
echo json_encode($response);


?>