<?php
	session_start();

if (!isset($_SESSION['stdid']))
header("location:index.php");
	$found = true;
	$resultm = array();
	$correct = array();
	$quesarr = array();
	$ansa = array();
	$ansb = array();
	$ansc = array();
	$ansd = array();
	$anse = array();
	$ansf = array();
	$ansg = array();
	$ansh = array();
	$ansi = array();
	$ansj = array();
	$count1=0;
	$display1="";
	$count2=0;
	$display2="";
	$count3=0;
	$display3="";
	if(!(isset($_POST['subjectname']) && isset($_POST['testid']))){
		header("location:index.php");
		exit;
		}
	else{
	$id = $_POST['testid'];
$subject = $_POST['subjectname'];
	require_once "mysql_connect.php";
	mysqli_set_charset($con, 'utf8');
	$quesids = array();
	$quesans = array();
	$result1 =mysqli_query($con,"select quesids, youranswers from ".$subject."_results where testid = $id  LIMIT 1") or die( mysqli_error($con)); 
	if(mysqli_num_rows($result1)>0){
		while($row = mysqli_fetch_array($result1)){
		$quesids = explode(",",$row['quesids']);
		$quesans = explode("#",$row['youranswers']);
		}
	}
	$ids = join(',',$quesids);		
				$result = mysqli_query($con,"select * from ".$subject."_questions where quesid IN($ids)")or die( mysqli_error($con)) ;
				$totalques = mysqli_num_rows($result);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){
					$i = array_search($row['quesid'], $quesids);
					$temp = explode(",",$quesans[$i]);
					sort($temp);
					$correct[$i]=$row['ans'];
					$ansa[$i] = "(a) ".$row['a'];
					$ansb[$i] = "(b) ".$row['b'];
					$ansc[$i] = "(c) ".$row['c'];
					$ansd[$i] = "(d) ".$row['d'];
					$anse[$i] = "(e) ".$row['e'];
					$ansf[$i] = "(f) ".$row['f'];
					$ansg[$i] = "(g) ".$row['g'];
					$ansh[$i] = "(h) ".$row['h'];
					$ansi[$i] = "(i) ".$row['i'];
					$ansj[$i] = "(j) ".$row['j'];
					$quesarr[$i] = "Q ".($i+1).". ".$row['question'];
					if($quesans[$i] == "" || $quesans[$i] == null){
					$count1++;
					$resultm[$i]="notattempted";
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
	}}


	?>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" /> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="formscss.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="browserversion.js"></script>
	<link rel="shortcut icon" href="http://e-education.co.in/Logo/e-education-logo-only.ico">
	<title>Result</title>
	<style>
	#head{
	background-color:rgba(75,75,75,1);
	color:rgb(255,242,18);		
	}
	#resulthead{
	background-color:rgba(255,242,18,0.6);	
	color:rgba(78,91,137,1);	
	line-height:23px;
	}
	#count{
	padding-top:9px;
	padding-bottom:9px;
	}
	#percent{
	font-size:30px;
	font-weight:600;
	padding-top:20px;
	padding-bottom:20px;
	line-height:22px;
	text-align:right;
	}
	#display{
	font-size:12px;
	}
	#buttons{
	padding:0;
	border:thin solid rgb(75,75,75);
	overflow:hidden;
	border-radius:5px;
	}
	#correct,#incorrect{
	border-right: thin solid rgb(75,75,75);
	}
	.button{
	padding:8px 0;
	overflow:hidden;
	cursor:pointer;
	}
	#details{
	margin-top:10px;
	margin-bottom:10px;
	height:350px;
	}
	#data{
	height:250px;
	margin-top:10px;
	margin-bottom:10px;
	text-align:left;
	overflow:auto;
	}
	.ansbo div{
	padding-top:4px;
	padding-bottom:4px;
	}
	#quesnum{
	
  line-height: 34px;
	}
	aside {
  line-height: 34px;
  position: relative;
  cursor: pointer;
  user-select: none;
  background-color:rgba(75,75,75,1);
color: rgb(255,242,18);
  position:relative;
  text-align:center;
  z-index:10;
  }

#chart_div{
height:339px;
}

aside.next:after {
  right: -17px;
  border-width: 17px 0 17px 17px;
}
aside.previous:after, aside.previous:before,aside.next:after, aside.next:before {
  border-color: transparent rgba(75,75,75,1);;
}
aside.previous:before {
  left: -17px;
  border-width: 17px 17px 17px 0;
}
aside:before, aside:after {
  content: '';
  position: absolute;
  height: 0;
  width: 0;
  border-style: solid;
  border-width: 0;
}
#headmenu{
background-color:rgb(100,100,100);
}
#headmenu:active{
background-color:rgb(75,75,75);
}
	</style>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script>
/**
 * jquery.detectSwipe v2.1.1
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch, iPad and Android
 * http://github.com/marcandre/detect_swipe
 * Based on touchwipe by Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 */
(function($) {

  $.detectSwipe = {
    version: '2.1.1',
    enabled: 'ontouchstart' in document.documentElement,
    preventDefault: false,
    threshold: 100
  };

  var startX,
    startY,
    isMoving = false;

  function onTouchEnd() {
    this.removeEventListener('touchmove', onTouchMove);
    this.removeEventListener('touchend', onTouchEnd);
    isMoving = false;
  }

  function onTouchMove(e) {
    if ($.detectSwipe.preventDefault) { e.preventDefault(); }
    if(isMoving) {
      var x = e.touches[0].pageX;
      var y = e.touches[0].pageY;
      var dx = startX - x;
      var dy = startY - y;
      var dir;
      if(Math.abs(dx) >= $.detectSwipe.threshold) {
        dir = dx > 0 ? 'left' : 'right'
      }
      else if(Math.abs(dy) >= $.detectSwipe.threshold) {
        dir = dy > 0 ? 'down' : 'up'
      }
      if(dir) {
        onTouchEnd.call(this);
        $(this).trigger('swipe', dir).trigger('swipe' + dir);
      }
    }
  }

  function onTouchStart(e) {
    if (e.touches.length == 1) {
      startX = e.touches[0].pageX;
      startY = e.touches[0].pageY;
      isMoving = true;
      this.addEventListener('touchmove', onTouchMove, false);
      this.addEventListener('touchend', onTouchEnd, false);
    }
  }

  function setup() {
    this.addEventListener && this.addEventListener('touchstart', onTouchStart, false);
  }

  function teardown() {
    this.removeEventListener('touchstart', onTouchStart);
  }

  $.event.special.swipe = { setup: setup };

  $.each(['left', 'up', 'down', 'right'], function () {
    $.event.special['swipe' + this] = { setup: function(){
      $(this).on('swipe', $.noop);
    } };
  });
})(jQuery);

</script>
	<script>
	 var options,data;
///////////chart
  google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
        // Create the data table.
         data = new google.visualization.DataTable();
        data.addColumn('string', 'Type');
        data.addColumn('number', 'Questions');
        data.addRows([
          ['Correct', <?php echo $count2;?>],
          ['Incorrect', <?php echo $count3;?>],
          ['Not Attempted', <?php echo $count1;?>]
        ]);
        // Set chart options
        options = {chartArea: {'width': '95%', 'height': '78%'},
		'legend':'bottom',
		'backgroundColor': 'transparent',
          slices: {
            0: { color: 'green' },
            1: { color: 'red' },
			2: { color: 'rgb(255,242,18)' }
          }
        };
		options.pieSliceTextStyle = {fontSize:12,color:'rgb(75,75,75)'};
        // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

 function selectHandler() {
    var selectedItem = chart.getSelection()[0];
	if(selectedItem){
	
	var val =  (data.getValue(selectedItem.row, 0));
	if(val == 'Not Attempted'){
	$("#notattempted").click();
	}
	else if(val == 'Correct'){
	$("#correct").click();
	}
	else if(val == 'Incorrect'){
	$("#incorrect").click();
	}
	}
  }
   google.visualization.events.addListener(chart, 'select', selectHandler);
   // });
        chart.draw(data, options);
               
      }
	  
////////////


var h,count1,count2,count3;
var w;
var notattempted,correct,incorrect,id=-1,selected;
$(window).resize(function(){
//document.body.style.zoom=($(window).width()+$(window).height())(w+h);
$("#tabs1").css("display","none");
var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
function selectHandler() {
    var selectedItem = chart.getSelection()[0];
	if(selectedItem){
	
	var val =  (data.getValue(selectedItem.row, 0));
	if(val == 'Not Attempted'){
	$("#notattempted").click();
	}
	else if(val == 'Correct'){
	$("#correct").click();
	}
	else if(val == 'Incorrect'){
	$("#incorrect").click();
	}
	}
  }
google.visualization.events.addListener(chart, 'select', selectHandler);
      chart.draw(data, options);
});
var correctarr,resultarr,markedans,markedans1;
var quesarr,ansa ,ansb , ansc ,ansd ,anse,ansf ,ansg ,ansh ,ansi ,ansj,totalques;
$(window).load(function(){
	w = $(window).width();
	h = $(window).height();
	$("#correctcount").html("Correct Questions: " +count2);
	$("#totalcount").html("Total Questions: " +totalques);
	$("#percent").html(Math.round((count2/totalques)*10000)/100 +" %" );
	$("#correct").click();
	});
	$(window).keyup(function(e){
if(e.which==39)
next();
if(e.which==37)
previous();
});
$(document).ready(function(){
$(".box").css("display","none");
$("hr").css("display","none");
$("#display").on('swiperight',  function(){ previous()})
         .on('swipeleft',  function(){ next()});
     
quesarr = new Array(),ansa = new Array(),ansb = new Array(),ansc = new Array(),ansd = new Array(),anse = new Array(),ansf = new Array(),ansg = new Array(),ansh = new Array(),ansi = new Array(),ansj = new Array(),markedans= new Array() ;
totalques = <?php echo json_encode($totalques)?>;
correctarr = (<?php echo json_encode($correct);?>);
resultarr = (<?php echo json_encode($resultm);?>);
count1 = (<?php echo json_encode($count1);?>);
count2= (<?php echo json_encode($count2);?>);
count3 = (<?php echo json_encode($count3);?>);

quesarr =  <?php echo json_encode($quesarr)?>;
ansa =  <?php echo json_encode($ansa)?>;
ansb =  <?php echo json_encode($ansb)?>;
ansc =  <?php echo json_encode($ansc)?>;
ansd =  <?php echo json_encode($ansd)?>;
anse =  <?php echo json_encode($anse)?>;
ansf =  <?php echo json_encode($ansf)?>;
ansg =  <?php echo json_encode($ansg)?>;
ansh =  <?php echo json_encode($ansh)?>;
ansi =  <?php echo json_encode($ansi)?>;
ansj =  <?php echo json_encode($ansj)?>;
markedans =  <?php echo json_encode($quesans)?>;
markedans1=markedans;
$(".button").click(function(e){
$(".button").css("background-color","transparent");
$(".button").css("color","rgb(75,75,75)");
count=0;
selected=$(this).attr('id');
$("#"+selected).css("background-color","rgb(75,75,75)");
$("#"+selected).css("color","rgb(255,242,18)");;	
loaddetails(0,true);
});

});

function loaddetails(g,next){

if((selected=="notattempted" && count1==0) || (selected=="correct" && count2==0) || (selected=="incorrect" && count3==0)){
$(".box").css("display","none");
$("hr").css("display","none");
}
else{
$(".box").css("display","");
$("hr").css("display","");
}
var i;
if(next){
for (i=g;i<totalques;i++)
if(resultarr[i]==selected)
break;
}
else
for ( i=g;i>=0;i--)
if(resultarr[i]==selected)
break;
if(i>-1 && i<totalques){
$("#question").html(quesarr[i]);
if(ansa[i]=="(a) ")
$("#ansa").css("display","none");
else{
$("#ansa").css("display","");
$("#ansa").html(ansa[i]);
}
if(ansb[i]=="(b) ")
$("#ansb").css("display","none");
else{
$("#ansb").css("display","");
$("#ansb").html(ansb[i]);
}
if(ansc[i]=="(c) ")
$("#ansc").css("display","none");
else{
$("#ansc").css("display","");
$("#ansc").html(ansc[i]);
}
if(ansd[i]=="(d) ")
$("#ansd").css("display","none");
else{
$("#ansd").css("display","");
$("#ansd").html(ansd[i]);
}
if(anse[i]=="(e) ")
$("#anse").css("display","none");
else{
$("#anse").css("display","");
$("#anse").html(anse[i]);
}
if(ansf[i]=="(f) ")
$("#ansf").css("display","none");
else{
$("#ansf").css("display","");
$("#ansf").html(ansf[i]);
}
if(ansg[i]=="(g) ")
$("#ansg").css("display","none");
else{
$("#ansg").css("display","");
$("#ansg").html(ansg[i]);
}
if(ansh[i]=="(h) ")
$("#ansh").css("display","none");
else{
$("#ansh").css("display","");
$("#ansh").html(ansh[i]);
}
if(ansi[i]=="(i) ")
$("#ansi").css("display","none");
else{
$("#ansi").css("display","");
$("#ansi").html(ansi[i]);
}
if(ansj[i]=="(j) ")
$("#ansj").css("display","none");
else{
$("#ansj").css("display","");
$("#ansj").html(ansj[i]);
}
if(resultarr[i]=="incorrect"){
$("#ans").html("("+markedans1[i]+")");
$("#ansbox").css("display","");
}
else{
$("#ansbox").css("display","none");

}

$("#correctans").html("("+correctarr[i].trim()+")");
id=i;
}
if(selected=="notattempted")
$("#quesnum").html((count1!=0?(count+1):count1)+" / "+count1);
else if(selected=="correct")
$("#quesnum").html((count2!=0?(count+1):count2)+" / "+count2);
else if(selected=="incorrect")
$("#quesnum").html((count3!=0?(count+1):count3)+" / "+count3);

}
function next(){
if((selected=="notattempted" && count != (count1-1))||((selected=="correct" && count != (count2-1)))||((selected=="incorrect" && count != (count3-1)))){
count++;

loaddetails(id+1,true);
}
}
function previous(){
if(count!=0){
count--;
loaddetails(id-1,false);
}
}
var count;
</script>
	</head>

	<body >
<body >
<?php require "temp_header.php"?>
<div class="row top50 hidden-xs hidden-sm">
</div>
<div id='content' class="container-fluid">																														
<div id="left" class="col-xs-12 col-md-2 hidden-xs hidden-sm">
</div>
	<div id='main' class='lifted drop-shadow col-xs-12 col-md-8'>
	<div id="head" class="row" >
<div class="col-xs-10 col-sm-11 col-md-12" id="headname">Result</div>
<div class="col-xs-2 col-sm-1 col-md-0 hidden-md hidden-lg" id="headmenu" onclick="$('#headerdiv').slideToggle();" ><span class="glyphicon glyphicon-menu-hamburger"></span></div>
</div>
	<div id="resulthead" class="row hidden-xs hidden-sm">
	<div id="count" class="col-xs-5 col-xs-offset-1" >
	<div id="correctcount"></div>
	<div id="totalcount"></div>
	</div>
	<div id="percent" class="col-xs-5" >
	</div>
	</div>
	<div id='details' class="row">
	<div id="chartcontain" class="col-xs-12 col-md-5"><div id="chart_div"></div></div>
	<div id="display" class="col-xs-12 col-md-7"><div id="buttons" class="col-xs-12"><div id="correct" class="button col-xs-4">Correct</div><div class="button col-xs-4" id="incorrect">Incorrect</div><div class="button col-xs-4" id="notattempted">Not Attempted</div></div>
	<div id="data" class="col-xs-12">
	<div id="questionbox" class="box row" ><div  id="question"></div></div>
	<div id="ansstart" class="hidden-sm hidden-md hidden-xs hidden-lg" ></div>
	<div id="ansabox" class="box ansbo row" ><div  id="ansa"></div></div>
	<div id="ansbbox" class="box ansbo row" ><div  id="ansb"></div></div>
	<div id="anscbox" class="box ansbo row" ><div  id="ansc"></div></div>
	<div id="ansdbox" class="box ansbo row" ><div  id="ansd"></div></div>
	<div id="ansebox" class="box ansbo row" ><div  id="anse"></div></div>
	<div id="ansfbox" class="box ansbo row" ><div  id="ansf"></div></div>
	<div id="ansgbox" class="box ansbo row" ><div  id="ansg"></div></div>
	<div id="anshbox" class="box ansbo row" ><div  id="ansh"></div></div>
	<div id="ansibox" class="box ansbo row" ><div  id="ansi"></div></div>
	<div id="ansjbox" class="box ansbo row" ><div  id="ansj"></div></div>
	<hr >

	<div id="ansbox" class="box row"><div class="label1 col-xs-6" id="anslabel1">Your Answer:</div><div class = "value col-xs-6" id="ans"></div><br><br></div>
	<div id="correctansbox" class="box row"><div class="label1 col-xs-6" id="correctanslabel1">Correct Answer:</div><div class = "value col-xs-6" id="correctans"></div></div>
	<hr >
	</div>
	<div id="lowerbutton" class="row"><aside class='previous col-xs-3 col-xs-offset-1 hidden-xs hidden-sm' title='Previous Question' onclick="previous()" >Previous</aside>
	<div id="quesnum" class="col-md-2 col-md-offset-1 col-xs-12">0 / 0</div>
<aside class='next col-xs-3 col-xs-offset-1 hidden-xs hidden-sm' onclick="next()" title='Next Question' >Next</aside></div>
	
	</div>
	</div>
	</div>
	<div id="right" class="col-xs-12 col-md-2 hidden-xs hidden-sm">
</div>
	</div>																								
	</body>
	</html>