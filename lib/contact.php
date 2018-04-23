<?php

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$response = array();

$error = false;

if(empty($name)){
	$error = true;
}
if(empty($email)){
	$error = true;
}
if(empty($comment)){
	$error = true;
}

if($error){
	return;
}

try{

	$to = 'andreasoduque@gmail.com';
	$subject = "Contact us"; 

	$message = "
	<html>
	<head>
	<title>Contact Us</title>
	</head>
	<body>
	<table cellpadding=\"10\">
	<tr>
	<td><strong>Name</strong></td>
	<td>{$name}</td>
	</tr>
	<tr>
	<td><strong>Email</strong></td>
	<td>{$email}</td>
	</tr>
	<tr>
	<td><strong>Comment</strong></td>
	<td>{$comment}</td>
	</tr>
	</table> 
	</body> 
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <info@iamandreaduque.com>' . "\r\n";
	//$headers .= 'Cc: ' . "\r\n";

	mail($to,$subject,$message,$headers);

	$response['error'] = 0;
	$response['message'] = "Email was successfuly submitted";

}catch(Exception $e) {
  	$response['error'] = 1;
	$response['message'] = "Error: " . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);

?>