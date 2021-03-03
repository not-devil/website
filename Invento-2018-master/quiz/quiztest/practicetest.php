<?php
       $found = true;
	$quediv="";
				$ques=array();
				$ansa=array();
				$ansb=array();
				$ansc=array();
				$ansd=array();
				$anse=array();
				$ansf=array();
				$ansg=array();
				$ansh=array();
				$ansi=array();
				$ansj=array();
				$quesids=array();
				$jumble = array();
				$multiple = array();
				$ques1;
$studentid = $_SESSION['stdid'];
if(true){
$subject = "cs_exe_tax";
$type = "practicetest";
require "mysql_connect.php";
$quesall = array();
$questimes = array();
$quesallcomp = array();
$totalques = 50;
$timelimit = 180;

$ij=0;
//$result = mysqli_query($con,"select quesid from ".$subject."_questions where  queslevel IN($levels) and chaptername IN($chaptername) order by rand()") or die (mysqli_error($con));
	mysqli_query($con,'SET CHARACTER SET utf8');
$result = mysqli_query($con,"select quesid from ".$subject."_questions order by rand()") or die (mysqli_error($con));
$ids = array();
				$correctans=array();
			
				$result1 = mysqli_query($con,"select * from (select * from cs_exe_tax_questions where chapternum=2 order by rand() LIMIT 20) as a
union
select * from (select * from cs_exe_tax_questions where chapternum=1 order by rand() LIMIT 30) as b") or die(mysqli_query($con));
				$i=0;
				$totalques = mysqli_num_rows($result1);
				$questionsnumber="";
				$youranswers="";
				$qtimetaken="";
				$ques1 = "";
				while($row1 = mysqli_fetch_array($result1)){
					$Cid="Q".$i;
					$j= $i+1;
						$ques[$i] = "Q ".$j.". ".imagesc($row1['question']);

					$youranswers .= "#";
					$qtimetaken .= ",60";
					$questionsnumber .= ",".$row1['quesid'];
$multiple[$i]=$row1['multiple'];$jumble[$i]=$row1['jumble'];$ansa[$i]=imagesc($row1['a']);$ansb[$i]=imagesc($row1['b']);$ansc[$i]=imagesc($row1['c']);$ansd[$i]=imagesc($row1['d']);$anse[$i]=imagesc($row1['e']);$ansf[$i]=imagesc($row1['f']);$ansg[$i]=imagesc($row1['g']);$ansh[$i]=imagesc($row1['h']);$ansi[$i]=imagesc($row1['i']);$ansj[$i]=imagesc($row1['j']);$correctans[$i]=$row1['ans'];
					$quesids[$i] = $row1['quesid'] ;
					$k=$j%2;
		$quediv .= "<div class='quescontain color_$k  col-xs-12' id='quescontain_$i'  onclick='loaddetails(this.id.substr(11),event)'><div id='$Cid' title='".$ques[$i]."'  class='question $i  col-xs-9'>$ques[$i]</div><div class='qtime  col-xs-2' title='Time Consumed In Question No. $j' id='qtime_$i'>000:00</div><div class='mark  col-xs-1' id='mark_$i'>&#9673;</div></div>";
			$i++;
	}
$youranswers = substr($youranswers,1);
	$qtimetaken = substr($qtimetaken,1);
	$questionsnumber = substr($questionsnumber,1);
	date_default_timezone_set('Asia/Kolkata');
	$time1 =  date("Y-m-d H:i:s"); 
			mysqli_query($con,"insert into ".$subject."_results (studentid,dateoftest,quesids,youranswers,qtimetaken,testtype,testtypeid) values ($studentid,'$time1','$questionsnumber','$youranswers','$qtimetaken','$type',0)") or die (mysqli_error($con));
		$result5 =  mysqli_query($con,"select testid from ".$subject."_results where studentid = $studentid order by testid desc LIMIT 1") or die(mysqli_error($con));
		while($row5 = mysqli_fetch_array($result5)){
		$testid = $row5['testid'];
		}
$questionsnumber = explode(",",$questionsnumber);
	 if(!$found){
	  if(isset($_POST['ontest']) || $_SESSION['setvariable']=="1")
	 for($i=0;$i<300;$i++){
	 $j = $i + 1;
	 $k=$j%2; 
	$Cid="Q".$i;	
		$quediv .= "<div class='quescontain color_$k  col-xs-12' id='quescontain_$i'  onclick='loaddetails(this.id.substr(11),event)'><div id='$Cid' title=''  class='question $i col-xs-9'></div><div class='qtime col-xs-2' title='Time Consumed In Question No. $j' id='qtime_$i'>000:00</div><div class='mark col-xs-1' id='mark_$i'>&#9673;</div></div>";
	}
	else{
	header("location:index.php");
	}
	 }
	}
	 function imagesc($str){

$indexi = 0;
					while( strpos($str,"#-#",$indexi)!==false){

					$path = substr($str,strpos($str,"#-#",$indexi)+3,strpos($str,"#--#",$indexi)-strpos($str,"#-#",$indexi)-3);
					$path1 = "images/".$path;
					$type = pathinfo($path1, PATHINFO_EXTENSION);
					$data = file_get_contents($path1);

					$imagesarr = 'data:image/' . $type . ';base64,' . base64_encode($data);
					$str = str_replace("#-#".$path."#--#","<img src='".$imagesarr."'>",$str);
						$indexi = strpos($str,"#--#",$indexi)+1;
						
					}
return  $str;
}
?>