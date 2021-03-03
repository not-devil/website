<?php 
	session_start();
$_SESSION['stdid']=2;

require "practicetest.php";
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" /> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="browserversion.js"></script>
	<link rel="shortcut icon" href="http://e-education.co.in/Logo/e-education-logo-only.ico">
	<title>MCQ Test</title>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123648728-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123648728-1');
</script>
<style>
::-webkit-scrollbar{
width:10px;
height:10px;
background-color:rgb(235,235,235);
} 
::-webkit-scrollbar-thumb{
border-radius:10px;
height: 10px;
width:10px;
background-color:rgb(102,102,102);
}
html,body{
margin:0;
height:100%;
overflow-x:hidden;
}
body{
min-height:100%;
background-color:rgb(233,234,247);
	font-family:"Open Sans";
	-webkit-touch-callout:none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
position:relative;
}
#content{
padding:0;
min-height:100%;
}
#head{
text-align:center;
color:rgba(255,255,255,1);
background-color:rgba(110,50,157,1);
font-family:  "Open Sans";
font-size:16px;
font-weight:600;
padding:0px;
display:block;
}
#headname{
padding-top:15px;
padding-bottom:15px;
line-height:26px;
vertical-align:center;
}
#headmenu,#headmenu2{
padding:15px 0;
background-color:rgba(71,33,103,1);
line-height:26px;
vertical-align:center;
}
#headmenu:active,#headmenu2:active{
background-color:rgba(110,50,157,1);
}
#headmenu span,#headmenu2 span{
line-height:26px;
font-size:20px;
}
#helpimage{
width:100%;
height:100%;
position:absolute;
top:0;
left:0;
z-index:6000;
background-size:100% 100%;
display:none;
}
.top50{
margin-bottom:40px;
}
#main {
	-webkit-box-shadow: 3px 5px 5px 0px rgba(204,204,204, 1),-3px 5px 5px 0px rgba(204,204,204, 1);
	   -moz-box-shadow: 3px 5px 5px 0px rgba(204,204,204, 1),-3px 5px 5px 0px rgba(204,204,204, 1);
	        box-shadow: 3px 5px 5px 0px rgba(204,204,204, 1),-3px 5px 5px 0px rgba(204,204,204, 1);
	background-color:rgb(255,255,255);
	height:530px;
	padding:0px;
	width:83.33%;
}
#quesans{
padding:0px;
height:424px;
overflow-y:auto;
}
#currques{
padding:10px 15px;
text-align: justify;
margin:0;
min-height:150px;
background-color:rgba(190,197,218,0.2);
color:rgba(78,91,137,1);
-webkit-box-shadow: 0px 10px 5px 0px rgba(204,204,204, 1);
-moz-box-shadow: 0px 10px 5px 0px rgba(204,204,204 ,1);
     box-shadow: 0px 10px 5px 0px rgba(204,204,204 ,1);
     margin-bottom:15px;
     
}
.ansradio{
display:none;
}
.ansopt{
padding:8px 5px;
margin:5px;
border-bottom:rgb(204,204,204) thin solid;
cursor:pointer;
color:rgba(78,91,137,1);
border-color:rgba(190,197,218,0.5);
border-width: medium;
outline:none;
}
.ansopt:focus{
border-bottom:rgb(110,50,157) medium solid;
}
#foot{
margin-top:5px;
margin-bottom:15px;
padding:0px;
}
#foot aside,#foot div{
padding:5px 0;
text-align:center;
}
aside,#submitbtn,#markques{
background-color:rgba(110,50,157,1);
color:white;
cursor:pointer;
}
aside.next:after {
  right: -15px;
  top:-0px;
  border-width: 15px 0px 15px 15px;
}
aside.previous:after, aside.previous:before,aside.next:after, aside.next:before {
  border-color: transparent rgba(110,50,157,1);
}
aside.previous:before {
  left: -15px;
  top:-0px;
  border-width: 15px 15px 15px 0;
}
aside:before, aside:after {
  content: '';
  position: absolute;
  height: 0;
  width: 0;
  border-style: solid;
  border-width: 0;
}
#questionpanel{
	padding:0px;
	padding-top:40px;
	top:0px;
	 
	width:0;
	position:absolute;
	-webkit-box-shadow: -3px 0px 5px 0px rgba(204,204,204, 1);
	   -moz-box-shadow: -3px 0px 5px 0px rgba(204,204,204, 1);
	        box-shadow: -3px 0px 5px 0px rgba(204,204,204, 1);
	height:100%; 
	right:0; 
}

#questionpanel #sidebar{
	height:100%; 
	background-color:rgb(255,255,255);
	position:relative;
	
	padding-top:76px;
}
#questionpanel #sidebar #sidebarhead{
		border-bottom:thin solid rgb(204,204,204);
	padding-top:10px;
	padding-bottom:10px;
	background-color:rgb(255,255,255);
	z-index:100;
	top:-76px;
	position:relative;
}
#questionpanel #questions {

height:100%;
position:relative;
z-index:99;
top:-76px;
	overflow:auto;
}
.question{

overflow:hidden;

text-align: justify;
vertical-align-middle;
}
.mark{
text-align:center;
	color: rgb(234,42,33);	
	background:transparent;
	padding:0;
}
.qtime{
text-align:center;
padding:0;
}
#questabs{
border:thin solid rgba(110,50,157,1);
border-radius:5px;
padding:0px;
}
#allques,#completedques{
border-right:thin solid rgba(110,50,157,1);
}
#allques,#pendingques{
border-bottom:thin solid rgba(110,50,157,1);
}
#markedques{
color:rgb(255,209,23);
}

#footer{
position:relative !important;
margin-top:40px;
}
#pendingques{
color:rgb(234,42,33);
}
#completedques{
color:rgb(16,188,46);
}
#allques{
background-color:rgb(110,50,157);
color:white;
}
.questype{
padding:3px 0px;
text-align:center;
cursor:pointer;
}
.color_0{
background-color:rgba(190,197,218,0.3);
}
.color_1{
background-color:white;
}
.quescontain{
height:40px;
overflow:hidden;
padding:5px 0;
cursor:pointer;
}
.question,.qtime{
font-size:12px;
}
.mark{
font-size:20px;
}
.question,.qtime,.mark{
line-height:30px;
}
#currcontain{
padding:0;
}
#answers{
padding:0 15px;
}
#blackcover{
height:100%;
width:100%;
z-index:5001;
opacity:0.5;
background-color:black;
color:white;
text-align:center;
font-size:150%;
position:absolute;
font-family: 'Open Sans';
top:0%;
left:0%;
display:none;
}

@media(max-width:991px){
::-webkit-scrollbar{
width:3px;
height:5px;
} 
::-webkit-scrollbar-thumb{
border-radius:3px;
height: 5px;
width:3px;
}
#content{
z-index:5;
}
body{
background-color:white;
}
#main{
min-width:100%;
width:100%;
-webkit-box-shadow: none;
	   -moz-box-shadow: none;
	        box-shadow: none;
}
#headerdiv{
z-index:2000 !important;
}
#questionpanel{
z-index:0 !important;
padding-top:0px;
top:56px;
width:0px;
}
#content,#main{
min-height:100%;
padding-bottom:0px;
}
#foot{
margin-top:20px;
margin-bottom:0px;
background-color:rgba(190,197,218,0.2);
color:rgba(78,91,137,1);
}
#questionpanel{
padding-bottom:56px;
width:0px;
}
}
@media(max-width:991px){
#quesans{
height:auto;
min-height:100%;
}
}
@media(max-width:782px){
#headname{
font-size:12px;
}
}
</style>


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
<script >
var quesarr,ansa ,ansb , ansc ,ansd ,anse,ansf ,ansg ,ansh ,ansi ,ansj,totalques,quesids,mytimer,jumble,multiple;
var timerinter=-1;
var markedans;
var starttime,currenttime,cookietime,d,questime;
var lastid="Q1";
var lastcolor = "rgba(255,255,255,1)";
var blinker=true;
var timelimit;
var w;
var sortedans = new Array();
$(window).resize(function(){
	w = $(window).width();
});
	$(window).load(function(){
	w = $(window).width();
	$("#blackcover").css("display","none");
	timelimit= parseInt(window.localStorage.getItem("timelimit"));
        $("#lines").css("display","inline-block");
	if (getCookie("testtime")==""){
	d = new Date();
	starttime = d.getTime();
	currenttime=starttime;
	timerinter=1000;
	d.setMinutes(parseInt(d.getMinutes()) + parseInt(timelimit));
	document.cookie = "testtimeexpire=" + d.toGMTString().replace(" ","") + ";expires=" + d.toGMTString();
	document.cookie = "testtime=" + starttime +"; expires=" + d.toGMTString();
	cookietime = starttime; 
	questime=0;
	}
	else{
	cookietime = getCookie("testtime");
	questime=parseInt(window.localStorage.questime);
	}
	timerinter=1000;
	mytimer =setInterval(function(){
	var e = new Date();
	if(currenttime>e.getTime() && currenttime!=cookietime)
	submittest("timechanged");
	currenttime = e.getTime();
	var sec2 = timelimit*60-parseInt((currenttime-cookietime)/1000);
	if((currenttime>(getCookie("testtimeexpire").replace(",",", ")) && sec2==-1)||sec2<0 || getCookie("testtimeexpire")=="")
	submittest(true);
	
	var sec2=window.localStorage.getItem("qtime_"+lastid.substr(1));
	if(sec2<=0){
		sec2=60
	
	next();
}
	sec2--;
	if(sec2<0)
		sec2=0
	$("#time").text(sec2)  ;
	if(sec2>=0){
	
	window.localStorage.setItem("qtime_"+lastid.substr(1), sec2);
	}
	},timerinter);
	
	});
$(document).ready(function(e) { 
$("#helpimage").click(function(){
$("body").css("overflow-y","auto");
$("#helpimage").css("display","none");
});
if((localStorage.getItem("totalques")=="" || localStorage.getItem("totalques")==null) && !(<?php  echo isset($_POST['subject'])? 1 : 1 ?>))
window.open("index.php","_self");
$("#quesans").on('swiperight',  function(){ previous()})
         .on('swipeleft',  function(){ next()});
         $("#foot").on('swiperight',  function(){ previous()})
         .on('swipeleft',  function(){ next()});
markedans = new Array(null);
		 if(window.localStorage.getItem("totalques") == null || window.localStorage.getItem("totalques") == "null"){
window.localStorage.setItem("timelimit",<?php echo json_encode($timelimit);?>);
window.localStorage.setItem("studentid",<?php echo json_encode($studentid);?>);		
window.localStorage.setItem("testtype","mcqtest");
quesarr=<?php echo json_encode($ques)?>;
ansa = (<?php echo json_encode($ansa);?>);
ansb = (<?php echo json_encode($ansb);?>);
ansc = (<?php echo json_encode($ansc);?>);
ansd = (<?php echo json_encode($ansd);?>);
anse = (<?php echo json_encode($anse);?>);
ansf = (<?php echo json_encode($ansf);?>);
ansg = (<?php echo json_encode($ansg);?>);
ansh = (<?php echo json_encode($ansh);?>);
ansi = (<?php echo json_encode($ansi);?>);
ansj = (<?php echo json_encode($ansj);?>);
jumble = (<?php echo json_encode($jumble);?>);
multiple = (<?php echo json_encode($multiple);?>);
totalques = (<?php echo json_encode($totalques);?>);
markedans=new Array(totalques);
quesids = (<?php echo json_encode($quesids);?>);
for (var i = 0 ;i<totalques;i++){
if(jumble[i]==1)
sortedans[i] = shuffleArray (new Array('a','b','c','d','e','f','g','h','i','j'));
else
sortedans[i] =  new Array('a','b','c','d','e','f','g','h','i','j');
document.getElementById("mark_"+i).style.color = "rgb(234,42,33)" ;
}
lastid = "Q0";
window.localStorage.setItem("totalques", totalques);
window.localStorage["quesarr"] = JSON.stringify(quesarr);
window.localStorage["ansa"] = JSON.stringify(ansa);
window.localStorage["ansb"] = JSON.stringify(ansb);
window.localStorage["ansc"] = JSON.stringify(ansc);
window.localStorage["ansd"] = JSON.stringify(ansd);
window.localStorage["anse"] = JSON.stringify(anse);
window.localStorage["ansf"] = JSON.stringify(ansf);
window.localStorage["ansg"] = JSON.stringify(ansg);
window.localStorage["ansh"] = JSON.stringify(ansh);
window.localStorage["ansi"] = JSON.stringify(ansi);
window.localStorage["ansj"] = JSON.stringify(ansj);
window.localStorage["multiple"] = JSON.stringify(multiple);
window.localStorage["quesids"] = JSON.stringify(quesids);
window.localStorage.setItem("subjectname",<?php echo json_encode($subject);?>);
window.localStorage.setItem("testid",<?php echo json_encode($testid);?>);
for(var i=0;i<totalques;i++){
if(i<20)
	window.localStorage.setItem("qtime_"+i, "60");
else
	window.localStorage.setItem("qtime_"+i, "20");
	window.localStorage["sortedans"+i] = JSON.stringify(sortedans[i]);
}
setsession();
}
else{
setsession();
var i=0;
totalques = window.localStorage.getItem("totalques");
quesarr = new Array(),ansa = new Array(),ansb = new Array(),ansc = new Array(),ansd = new Array(),anse = new Array(),ansf = new Array(),ansg = new Array(),ansh = new Array(),ansi = new Array(),ansj = new Array(),quesids = new Array();
quesarr =  JSON.parse(window.localStorage["quesarr"]);
ansa =  JSON.parse(window.localStorage["ansa"]);
ansb =  JSON.parse(window.localStorage["ansb"]);
ansc =  JSON.parse(window.localStorage["ansc"]);
ansd =  JSON.parse(window.localStorage["ansd"]);
anse =  JSON.parse(window.localStorage["anse"]);
ansf =  JSON.parse(window.localStorage["ansf"]);
ansg =  JSON.parse(window.localStorage["ansg"]);
ansh =  JSON.parse(window.localStorage["ansh"]);
ansi =  JSON.parse(window.localStorage["ansi"]);
ansj =  JSON.parse(window.localStorage["ansj"]);
multiple =  JSON.parse(window.localStorage["multiple"]);
quesids =  JSON.parse(window.localStorage["quesids"]);
for (var ij = totalques ;ij<1000; ij++){
$("#quescontain_"+ij).remove();
}
for(var i=0;i<totalques;i++){
$("#Q"+i).html(quesarr[i]);
$("#Q"+i).attr("title",quesarr[i]);
markedans[i] = window.localStorage.getItem("marked"+i);
var color = window.localStorage.getItem("color"+i);
if(color==""||color==null)
color = "rgb(234,42,33)";
$('#mark_'+i).css("color",color);
$("#qtime_"+i).text(window.localStorage.getItem("qtime_"+i));
sortedans[i] = new Array();
sortedans[i] = JSON.parse(window.localStorage["sortedans"+i]);

}
lastid = window.localStorage.lastid;
}

$(".btn2").click(function() {
  $( "#leftpanel" ).slideToggle( "slow");
  });
loaddetails(lastid);
$(".btn11").click(function(e) {
if ($("#right").css("display")=="block"){
	$("#right").css("display","none");
   $("#questionpanel").animate({width:'27%'},"slow");
   $("#main").animate({width:'62%'},"slow");
}
else if($("#right").css("display")=="none"){
   $("#questionpanel").animate({width:'0%'},"slow");
   $("#main").animate({width:'83.33%'},"slow");
   	$("#right").css("display","inline");
}
});
$("#headmenu").click(function(e) {
e.preventDefault();
if ($("#questionpanel").css("width")=="0px"){
   $("#questionpanel").animate({width:'100%',opacity:'1'},500);
	$("body").css("overflow","hidden");
  // $("#quesans").animate({width:'0%'},500);
  $("#foot").fadeOut(500);
}
else {
   $("#questionpanel").animate({width:'0%',opacity:'0'},500);
   //$("#quesans").animate({width:'100%'},"slow");
   $("body").css("overflow-y","auto");
   $("#foot").fadeIn(500);
}
});
var on=false;
$(".ansopt").click(function(e) {
id = e.target.id;
	if(e.target.id.substr(0,6)!="ansopt" && e.target.id.substr(0,5) != "radio" )
	id = e.target.parentNode.id
	if(id.substr(0,5)!="radio"){
		$("#"+id).blur();
	rad("radio"+id.substr(6));
	}
});
$(".ansopt").keyup(function(e) {

if(e.which==32){
			$("#"+e.target.id).blur();
rad("radio"+e.target.id.substr(6));
}
		if(e.which==38){
	e.preventDefault(); 
	var id = document.activeElement.id;
		do {
		id = $("#"+id).prev().attr('id');
		if(id.substr(0,6)!="ansopt")
		break;
		}while($("#"+id).text().trim()=="");
		if(id.substr(0,6)=="ansopt"){
$("#"+id).focus();
}
	}
		if(e.which==40){
	e.preventDefault(); 
	var id = document.activeElement.id;
		do {
		id = $("#"+id).next().attr('id');
		if(id.substr(0,6)!="ansopt")
		break;
		}while($("#"+id).text().trim()=="");
		if(id.substr(0,6)=="ansopt")
$("#"+id).focus();
	}
	});

			});
		
$(document).keyup(function(e) {
    if(e.which==39)
next();
    if(e.which==37)
previous();
});

$(document).keydown(function(e) {
    if(e.keyCode == 32) {
        return false;
    }
});
function loaddetails(id,e)
{

markedans[id.substr(1)] = localStorage.getItem("marked"+id.substr(1));
window.localStorage.setItem("lastid",id);
if(document.getElementById('mark_'+id.substr(1)).style.color==$("#markedques").css("color") || document.getElementById('mark_'+id.substr(1)).style.color==$("#markedques").css("background-color")){
$("#markques").html("Unmark");
$("#markques").attr("Title","Unmark This Question");
}
else{
$("#markques").html("Mark");
$("#markques").attr("Title","Mark This Question");
}

$("#quesnum").html(parseInt(id.substr(1))+1+"/"+totalques);

if($("#questionpanel").css("left")=="0px"){
 $("#questionpanel").animate({left:'100%',width:'0%',opacity:'0'},500);
    $("#quesans").fadeIn(500);
}

	$(".ansopt").css("background-color","rgba(255,255,255,1)");
if(markedans[id.substr(1)] != null){
var temp = markedans[id.substr(1)].split(",");
for(var ij=0;ij<temp.length;ij++)
$("#ansopt"+temp[ij]).css("background-color","rgba(110,50,157,.15)");
previd="radio"+temp[0];
prevalue=true;
}
else{

previd=null;
prevalue=true;
}	
	 on=false;
if(lastid!=id){
$("#quescontain_"+parseInt(lastid.substr(1))).css("color","rgba(78,91,137,1)");	
if(prequestype!="allques")
$("#quescontain_"+parseInt(lastid.substr(1))).css("background-color",lastcolor);
else
if(lastid.substr(1)%2==1){
$("#quescontain_"+parseInt(lastid.substr(1))).css("background-color","rgba(190,197,218,0.2)");
}
else	{
$("#quescontain_"+parseInt(lastid.substr(1))).css("background-color","rgba(255,255,255,1)");}
}
lastcolor = $("#quescontain_"+parseInt(id.substr(1))).css("background-color");
$("#quescontain_"+parseInt(id.substr(1))).css("background-color","rgba(110,50,157,.5)");
$("#quescontain_"+parseInt(id.substr(1))).css("color","rgba(255,255,255,1)");

$("#currques").html(quesarr[id.substr(1)]);
$("#ansa").html(ansa[id.substr(1)]);
$("#ansb").html(ansb[id.substr(1)]);
$("#ansc").html(ansc[id.substr(1)]);
$("#ansd").html(ansd[id.substr(1)]);
$("#anse").html(anse[id.substr(1)]);
$("#ansf").html(ansf[id.substr(1)]);
$("#ansg").html(ansg[id.substr(1)]);
$("#ansh").html(ansh[id.substr(1)]);
$("#ansi").html(ansi[id.substr(1)]);
$("#ansj").html(ansj[id.substr(1)]);

var elems = document.getElementsByClassName("ansv");
for(var i=0;i<elems.length;i++){
document.getElementsByClassName("ansradio").item(i).checked=false;
if(elems[i].innerHTML=="" || elems[i].innerHTML==null){
document.getElementsByClassName("ansopt").item(i).style.display="none";
}
else{
document.getElementsByClassName("ansopt").item(i).style.display="block";
}
}
var flag = true;
$("#ansopt"+sortedans[id.substr(1)][0]).insertAfter("#ansstart");
var tabindex = 1;
$("#ansopt"+sortedans[id.substr(1)][0]).attr('tabindex',tabindex);
if($("#ansopt"+sortedans[id.substr(1)][0]).text().trim()!=""&& flag){
flag=false;
$("#ansopt"+sortedans[id.substr(1)][0]).focus();
}

for(var i=1;i<10;i++){
$("#ansopt"+sortedans[id.substr(1)][i]).insertAfter("#ansopt"+sortedans[id.substr(1)][i-1]);
$("#ansopt"+sortedans[id.substr(1)][i]).attr('tabindex',tabindex+i);
if($("#ansopt"+sortedans[id.substr(1)][i]).text().trim()!=""&& flag){
flag=false;
$("#ansopt"+sortedans[id.substr(1)][i]).focus();
}
}
lastid=id;	

if(markedans[lastid.substr(1)]!=null){
var temp = markedans[lastid.substr(1)].split(",");
for(var ij=0;ij<temp.length;ij++)
		document.getElementById("radio"+temp[ij]).checked = true;
		}
if($("#headmenu").css("display")=="block" )
if( $("#questionpanel").css("width")>"0px")
$("#headmenu").click();
}
function next(){
var num=(parseInt(lastid.substr(1))+1);
while($("#quescontain_"+num).css("display")=="none" ){
num++;
}
var id = "Q"+ num;
if(num<20){
	sec2=45;
loaddetails(id);
}
else if(num<50){
	sec2=20;
loaddetails(id);
}
else
submittest(true);
}

function rad(id){

markedans[lastid.substr(1)] = localStorage.getItem("marked"+lastid.substr(1));
if(multiple[lastid.substr(1)]==0){
	$(".ansopt").css("background-color","rgba(255,255,255,1)");
	if(markedans[lastid.substr(1)] != null && document.getElementById(id).checked==false)
	document.getElementById("ansopt"+markedans[lastid.substr(1)]).checked=false
}
	if(id != previd){
	previd=id;
	prevalue=false;
	}
	if(document.getElementById(id).checked==true ){
	$("#ansopt"+id.substr(5)).css("background-color","rgba(255,255,255,.15)");
	document.getElementById(id).checked=false;
	prevalue=false;
	var temp = markedans[lastid.substr(1)].split(",");
	if(temp.length>1){
	temp.splice(temp.indexOf(id.substr(5)),1);
		
	 markedans[lastid.substr(1)] = temp.join(",");
	 window.localStorage.setItem("marked"+lastid.substr(1), markedans[lastid.substr(1)]);
	}
	else{
	window.localStorage.removeItem("marked"+lastid.substr(1));
markedans[lastid.substr(1)]=null;

if(document.getElementById("mark_"+lastid.substr(1)).style.color!=$("#markedques").css("color") && document.getElementById("mark_"+lastid.substr(1)).style.color!=$("#markedques").css("background-color")){
$('#mark_'+lastid.substr(1)).css("color","rgb(234,42,33)");
	if(prequestype=="allques" || prequestype=="pendingques")
    $('#quescontain_'+lastid.substr(1)).css("display","block");
    else
    $('#quescontain_'+lastid.substr(1)).css("display","none");
    }
    }
	}
	else{
$("#ansopt"+previd.substr(5)).css("background-color","rgba(110,50,157,.15)");
if(multiple[lastid.substr(1)]==1 && markedans[lastid.substr(1)]){
if(markedans[lastid.substr(1)].length>=1)
markedans[lastid.substr(1)]+=","+id.substr(5);
}
else{
$(".ansradio").prop("checked",false); 

markedans[lastid.substr(1)]=id.substr(5);
}
	document.getElementById(id).checked=true;
prevalue=true;

window.localStorage.setItem("marked"+lastid.substr(1), markedans[lastid.substr(1)]);

if(document.getElementById("mark_"+lastid.substr(1)).style.color!=$("#markedques").css("color") && document.getElementById("mark_"+lastid.substr(1)).style.color!=$("#markedques").css("background-color")){

$('#mark_'+lastid.substr(1)).css("color","rgb(16,188,46)");
	if(prequestype=="allques" || prequestype=="completedques")
    $('#quescontain_'+lastid.substr(1)).css("display","block");
    else
    $('#quescontain_'+lastid.substr(1)).css("display","none");
    }
	}
	$("#"+id).parent().focus();
	window.localStorage.setItem("color"+lastid.substr(1), document.getElementById('mark_'+lastid.substr(1)).style.color);
//	window.localStorage.setItem("color"+lastid.substr(1), $('#mark_'+lastid.substr(1)).css("color"));	
}
function loadques(id){
$("#"+prequestype).css("color",$("#"+prequestype).css("background-color"));
$("#"+prequestype).css("background-color","transparent");
$(".questype,#questabs").css("border-color",$("#"+id).css("color"));
$("#"+id).css("background-color",$("#"+id).css("color"));
$("#"+id).css("color","rgba(255,255,255,1)");
if(id=="allques"){
$(".quescontain").css("display","block");
$(".color_0").css("background-color","rgba(190,197,218,0.3)");
$(".color_1").css("background-color","rgba(255,255,255,1)");
}
else
{
var color = $("#"+id).css("background-color");
var changecolor=false;
for(var i = 0; i<totalques;i++){
if(document.getElementById("mark_"+i).style.color==color){
$("#quescontain_"+i).css("display","block");
if(changecolor){
$("#quescontain_"+i).css("background-color","rgba(190,197,218,0.3)");
changecolor = false;
}
else{
changecolor=true;
$("#quescontain_"+i).css("background-color","rgba(255,255,255,1)");
}
}
else
$("#quescontain_"+i).css("display","none");
}
}
prequestype=id;
lastcolor = $("#quescontain_"+lastid.substr(1)).css("background-color");
$("#quescontain_"+parseInt(lastid.substr(1))).css("background-color","rgba(110,50,157,.5)");
}
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}
var prevalue=true,previd=null;
var prequestype="allques";
function markques(){
if($('#markques').html()!="Mark"){
$("#markques").html("Mark");
$("#markques").attr("Title","Mark This Question");
if(markedans[lastid.substr(1)]==null){
var color  = "rgb(234,42,33)";
    if(prequestype=="allques" || prequestype=="pendingques")
	$('#quescontain_'+lastid.substr(1)).css("display","block");
    else
    $('#quescontain_'+lastid.substr(1)).css("display","none");
    }
else{
var color = "rgb(16,188,46)";
	if(prequestype=="allques" || prequestype=="completedques")
    $('#quescontain_'+lastid.substr(1)).css("display","block");
    else
    $('#quescontain_'+lastid.substr(1)).css("display","none");
    }
}
else{
$("#markques").html("Unmark");
$("#markques").attr("Title","Unmark This Question");

$('#mark_'+lastid.substr(1)).css("border-color","rgb(255,209,23)");
	var color ="rgb(255,209,23)";
    if(prequestype=="allques" || prequestype=="markedques")
    $('#quescontain_'+lastid.substr(1)).css("display","block");
    else
    $('#quescontain_'+lastid.substr(1)).css("display","none");
}
$('#mark_'+lastid.substr(1)).css("color",color);
	window.localStorage.setItem("color"+lastid.substr(1), document.getElementById('mark_'+lastid.substr(1)).style.color);
	}
window.onbeforeunlooad = function(e) {
	
if(reload)	
return window.localStorage.lastid;
};
function submittest(timeover){
var result=timeover;
if(result==true)
$("#blackcover").html('<span style="display:table;width:100%;height:100%;"><span style="display:table-cell;vertical-align:middle;">Time Up...!!<br>Submitting Test<br>Processing...</span></span>');
if (result=="timechanged"){
result=true;
alert("System time has been manipulated. Test Ended.");
}
else if(!result){
result = confirm("Are you sure you want to submit your test?");
}
if(result){

       $("#blackcover").css("display","block");           
for(var i=0;i<localStorage.getItem("totalques");i++){
if(localStorage.getItem("marked"+i)==null)
markedans[i]="";
else
markedans[i] = localStorage.getItem("marked"+i);
}
qtimetaken="";
for(var ij=0;ij<localStorage.getItem("totalques");ij++)
qtimetaken += ","+localStorage.getItem("qtime_"+ij);
qtimetaken = qtimetaken.substr(1);
var hr = new XMLHttpRequest();
var url = "result.php";
var vars = "quesids="+JSON.stringify(quesids)+"&quesans1="+JSON.stringify(markedans)+"&testidinp="+localStorage.getItem("testid")+"&subjectname="+localStorage.getItem("subjectname")+"&qtimetaken="+qtimetaken;
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {  
if(hr.readyState == 4 && hr.status == 200) {
clearInterval(mytimer);
var mapForm = document.createElement("form");
mapForm.target = "_self"; 
mapForm.id = "formsend";    
mapForm.method = "POST";
mapForm.action = "viewresult.php";
mapForm.style="display:none"
// Create an input
var mapInput1 = document.createElement("input");
mapInput1.type = "text";
mapInput1.name = "testid";
mapInput1.id = "testid";
mapInput1.value = localStorage.getItem("testid");
var mapInput2 = document.createElement("input");
mapInput2.type = "text";
mapInput2.name = "subjectname";
mapInput2.id = "subjectname";
mapInput2.value = localStorage.getItem("subjectname");
// Add the input to the form
mapForm.appendChild(mapInput1);
mapForm.appendChild(mapInput2);
// Add the form to dom
document.body.appendChild(mapForm);
document.getElementById("formsend").style.display="none";
// Just submit
localStorage.clear();
document.cookie = "testtime" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
document.cookie = "testtimeexpire" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
mapForm.submit();         
}
}
hr.send(vars);

}
}
function helpon(){
//$( "#headerdiv" ).slideUp( "slow");
//$("#helpimage").css("display","block");
//	$("body").css("overflow","hidden");
}
function setsession(){
var hr = new XMLHttpRequest();
var url = "sessionvariable.php";
var vars = "data=set";
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.send(vars);
}
</script>
</head>
<div id="helpimage" ></div>
<body >

<?php require "temp_header3.php" ?>
<div id="content" class="container-fluid">
<div class="row top50 hidden-xs hidden-sm">
</div>

<div id="left" class="col-xs-12 col-md-1 hidden-xs hidden-sm">
</div>
<div id="main" class='col-xs-12 col-md-10'>

<div id="head" class="col-xs-12">
<div class="col-xs-12 col-sm-12 col-md-12" id="headname">
<div id="tr" > Time Remaining&nbsp;(seconds)&nbsp;<span id="time" style="display:inline" >0</span></div>
</div>

</div>
<div id="quesans" class="col-xs-12">
<div class="container-fluid" id="currcontain">
<div id="currques" class="col-xs-12">

</div>
</div>
<div id="answers">
<div id="ansstart" style="display:none"></div>
<div class="ansopt" tabindex = 1 id="ansopta"><input type="radio" onclick="rad(this.id)" value="radioa" class="ansradio"  id="radioa" /><div id="ansa" class="ansv" ></div></div>
<div class="ansopt" id="ansoptb" tabindex = 2>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radiob"  id="radiob" /><div id="ansb" class="ansv"></div>
</div><div class="ansopt" id="ansoptc" tabindex = 3>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radioc" id="radioc" /><div id="ansc" class="ansv"></div>
</div><div class="ansopt" id="ansoptd" tabindex = 4>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radiod" id="radiod" /><div id="ansd" class="ansv"></div>
</div><div class="ansopt" id="ansopte" tabindex = 5>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radioe" id="radioe" /><div id="anse" class="ansv"></div>
</div><div class="ansopt" id="ansoptf" tabindex = 6>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radiof"  id="radiof" /><div id="ansf" class="ansv"></div>
</div><div class="ansopt" id="ansoptg" tabindex = 7>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radiog" id="radiog" /><div id="ansg" class="ansv"></div>
</div><div class="ansopt" id="ansopth" tabindex = 8>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radioh" id="radioh" /><div id="ansh" class="ansv"></div>
</div><div class="ansopt" id="ansopti" tabindex = 9>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radioi" id="radioi" /><div id="ansi" class="ansv"></div>
</div><div class="ansopt" id="ansoptj" tabindex = 10>
<input type="radio"  class="ansradio" onclick="rad(this.id)" value="radioj" id="radioj" /><div id="ansj" class="ansv"></div>
</div>
</div>
</div>
<div id="foot" class="col-xs-12">
<div id="quesnum" class='col-xs-7 col-md-3 col-md-offset-3'></div>
<aside class='next col-xs-1 col-xs-offset-1 ' onclick="next()" title='Next Question' >Next</aside>
</div>

</div>
<div id="right" class="col-xs-12 col-md-1 hidden-xs hidden-sm">
</div>


</div>
<?php// require "footer.php"
 ?>
<div id="blackcover">
<span style="display:table;width:100%;height:100%;"><span style="display:table-cell;vertical-align:middle;">Processing...</span></span>
</div>
<div id="questionpanel" class="col-xs-0 ">
	<div id="sidebar" class="container-fluid">
		<div id="sidebarhead" class="row">
    	<div id="questabs" class="col-xs-10 col-xs-offset-1"><div onclick="loadques(this.id)" id="allques" class="questype col-xs-6 ">All</div><div onclick="loadques(this.id)" id="pendingques" class="questype col-xs-6 ">Pending</div><div onclick="loadques(this.id)" id="completedques" class="questype col-xs-6 ">Completed</div><div onclick="loadques(this.id)" id="markedques" class="questype col-xs-6">Marked</div></div></div>
    <div id="questions" class="row">
		<?php echo $quediv;?>
	  </div>
  </div>
</div>
</body>
</html>
			
			