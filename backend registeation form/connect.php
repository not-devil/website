<?php

//this this is take part 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$Gender = $_POST['Gender'];
$email = $_POST['email'];
$Number = $_POST['Number'];
$City = $_POST['City'];
$PIN = $_POST['PIN'];
$username = $_POST['username'];
$password = $_POST['password'];

//this is connecting 
if(!empty($fname )||!empty($lname )||!empty($Gender )||!empty($email )||!empty($Number )||!empty($City )||!empty($PIN )||!empty($username )||!empty($password))
      {
        $host="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbname="registration";
        $conn= new mysqli($host , $dbUsername , $dbPassword , $dbname );
             
             if(mysqli_connect_error())
             
             	die('(connect Error(' . mysql_connect_errno() .')' . mysql_connect_error());
             
             else
             {
             	$SELECT="SELECT username From registration1 where username = ? Limit 1" ;
             	$INSERT = "INSERT Into registration(fname , lname , Gender , email , Number , City , PIN , username , password ) values (? , ? , ? , ? , ? ,? ,?, ? , ?)";
             	//prepare statement 
             	$stmt  = $conn->prepare($SELECT);
             	$stmt ->bind_param("s" , $username);
             	$stmt->execute();
             	$stmt-> bid_result($username);
             	$stmt->store_result();
             	$rnum=$stmt->num_rows;

             	if($rnum==0){
             		$stmt->close();

             		$stmt=$conn->prepare($INSERT);
             		$stmt->bind_param("ssssisiss" , $fname , $lname , $Gender , $email , $Number , $City , $PIN , $username , $password );
             		$stmt->execute();
             		echo "wellcome to the web side ,you enter sucessfully";
             	}else{
             		echo "this usernam not valid  this is allready rgisterd ";
             	}
             }
             $stmt->close();
             $conn->close();


      }else
      {
      	echo ("all field required");

      }

	         

?>