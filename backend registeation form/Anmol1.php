<?php
$studentname = $_POST['studentname'];
$surname= $_POST['surname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];

//database connectionn are made by  firstly add database name and
//con as avariable
$conn = new mysqli('localhost','root',' ','anmol');

  if($conn->connect_error)
  {
  	die('connection failed : ' .$conn->connect_error);
  }
  else
  {
  	$stmt = $conn->prepare("insert into student(studentname,surname,email,contact,gander,username,password) values(?,?,?,?,?,?,?,)");
  	$stmt->bind_param("sssisss",$studentname,$surname,$email,$contact,$gander,$username,$password );
  	$stmt->execute();
  	echo "register succesfull....";
  	$stmt->close();
  	$conn->close();
  }


?>
