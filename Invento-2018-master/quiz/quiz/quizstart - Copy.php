<!doctype html>
<html>
<head>
<title>QUIZ</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<link rel="stylesheet" href="../tbootstrap/css/bootstrap.min.css" />
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123648728-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123648728-1');
</script>
</head>

<?php

	require_once('../commonvar.php');

	$conn=mysqli_connect($server,$user,$pass,$db) or die("db connection problem");
	
if(isset($_POST['submit'])){
	
	
	
	$code=$_POST['code1'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$college=$_POST['college'];
	$code1=$_POST['code21'];
	$name1=$_POST['name1'];
	$email1=$_POST['email1'];
	$college1=$_POST['college1'];

	if($code!=$code1){
	
		$tquery1="SELECT * FROM quizcode WHERE code='$code' AND verify='0' ";
		
		$tquery2="SELECT * FROM quizcode WHERE code='$code1' AND verify='0' ";

		$tresult1=mysqli_query($conn,$tquery1);
		
		$tresult2=mysqli_query($conn,$tquery2);
		
		$tcount1=mysqli_num_rows($tresult1);

		$tcount2=mysqli_num_rows($tresult1);

	if($tcount1==1 && $tcount2==1){	
	
	$query="UPDATE quizcode SET verify='1' WHERE code='$code' OR code='$code1'";
	
	mysqli_query($conn,$query) or die('query not working');
	
	
	
	$query="INSERT INTO quiz (code1,name1,email1,college1,code2,name2,email2,college2) VALUES('$code','$name','$email','$college','$code1','$name1','$email1','$college1')";
	
	mysqli_query($conn,$query) or die('query not working');
	
	
	
	
	$lastid=mysqli_insert_id($conn);
	
	SESSION_START();
	$_SESSION['stdid']=$lastid;
	header("Location: ../quiztest/mcqtest.php");
    exit;
	/*Send to next page*/
		}
		else{
			
			
			echo"<script>alert('Wrong credentials');</script>";
			
		}
		
	
	}
	
}	
mysqli_close($conn);
	

?>


<body style="padding-top:80px;">


				

<form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">  
				<div class="col-xs-12 col-md-6 col-md-offset-0">	
				 <div style="border-radius:5px;border: 2px #E4E4E4 solid" class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 ">
					
						 <h4 style="padding-top:8px;" class="text-center">Student 1</h4>
					
					 <div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="code" class="text-uppercase">Code 1</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="text" name="code1" id="code1" class="form-control">
                                <!-- end input  -->
                            </div>
							
					
							<div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="name" class="text-uppercase">Name</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="text" name="name" id="name" class="form-control">
                                <!-- end input  -->
                            </div>
							
							 <div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="email" class="text-uppercase">Email</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="email" name="email" id="email" class="form-control">
                                <!-- end input  -->
                            </div>
							
							<div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="college" class="text-uppercase">College</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="text" name="college" id="college" class="form-control">
                                <!-- end input  -->
                            </div>
							
							
							

				 </div>
				</div>	
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="col-xs-12 col-md-6 col-md-offset-0">	
				 <div style="border-radius:5px;border: 2px #E4E4E4 solid" class="col-xs-10 col-xs-offset-1 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 ">
					
						
					
					
						 <h4 style="padding-top:8px;" class="text-center">Student 2</h4>
					
							<div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="cod2" class="text-uppercase">Code2</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="text" name="code21" id="code2" class="form-control">
                                <!-- end input  -->
                            </div>
					
							<div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="name" class="text-uppercase">Name</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="text" name="name1" id="name" class="form-control">
                                <!-- end input  -->
                            </div>
							
							 <div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="email" class="text-uppercase">Email</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="email" name="email1" id="email" class="form-control">
                                <!-- end input  -->
                            </div>
							
							<div class="form-group no-margin-bottom">
                                <!-- label  -->
                                <label for="college" class="text-uppercase">College</label>
                                <!-- end label  -->
                                <!-- input  -->
                                <input required="required" type="text" name="college1" id="college" class="form-control">
                                <!-- end input  -->
                            </div>
							
							 
							
							

				 </div>
				</div>	
				   


				
				
				
				
				
				
				
				
				<div style="padding-top:50px;" class="text-center col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
				<div class="form-group">
		 <button class=" btn btn-warning " name="submit" type="submit">Submit</button>
		</div>		
				</div>
				
			</form>	
						
						
</body>


	
		<!-- jQuery -->
		<script src="tbootstrap/js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="tbootstrap/js/bootstrap.min.js"></script>

</html>