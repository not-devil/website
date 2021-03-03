	<?php
	session_start();
	$found = true;
	$count1=0;
	$display1="";
	$count2=0;
	$display2="";
	$count3=0;
	$display3="";
	if(isset($_POST['quesids'])&& isset($_POST['quesans1']) && isset($_POST['testidinp'])){ 
	$_SESSION['setvariable'] = "0";
	require_once "mysql_connect.php";
	$quesids = json_decode($_POST['quesids']);
	$studentid = $_SESSION['stdid'];
	$ids = join(',',$quesids);
	$quesans = json_decode($_POST['quesans1']);
	$quesansarr = join('#',$quesans);
	$testid = $_POST['testidinp'];
	$quesimplode = $ids;
	$subject = $_POST['subjectname'];
	$qtimetaken = $_POST['qtimetaken'];
	$ansimplode = $quesansarr;
					mysqli_set_charset($con, 'utf8');
				$result = mysqli_query($con,"select quesid,ans from ".$subject."_questions where quesid IN($ids) ") or die(mysqli_error($con));
				if(mysqli_num_rows($result)>0){
					
					while($row = mysqli_fetch_array($result)){
					$i = array_search($row['quesid'], $quesids);
					$temp = explode(",",$quesans[$i]);
					sort($temp);
					if($quesans[$i] == "" || $quesans[$i] == null){
					$count1++;
					}
					else if (str_split(preg_replace("/\PL/u", "", $row['ans']))==$temp){
						$count2++;
					$resultm[$i]="correct";
						}
					else{
						$count3++;
					$resultm[$i]="incorrect";
					}
					
					}
			
	}
	$resultpercent = ($count2/($count1+$count2+$count3))*100;
	$points = 0;
	switch(true){
	case ($resultpercent>90):$points=600;
				break;
	case ($resultpercent>80):$points=500;
				break;
	case ($resultpercent>70):$points=400;
				break;
	case ($resultpercent>60):$points=300;
				break;
	case ($resultpercent>50):$points=200;
				break;
	case ($resultpercent>40):$points=100;
				break;
	default:$points=0;
	}
	//mysqli_query($con,"update student set  points = student.points + $points where studentid = $studentid  LIMIT 1") or die(mysqli_error($con));
					mysqli_query($con,"update ".$subject."_results set  youranswers = '$ansimplode' , qtimetaken = '$qtimetaken' , percent = $resultpercent where testid = $testid LIMIT 1") or die(mysqli_error($con));}
	else{
	$found = false;
	}
	?>