<style>

#headerdiv{
background-color:rgba(75,75,75,1);
min-height:40px;
margin :0px;
z-index:100;
padding:0;
display:block;
border:none;
}

#headerdiv .menitem {
color:rgb(255,242,33);
text-align:center;
cursor:pointer;
padding-right:0px ;
padding-left:0px ;
}
#headerdiv .menitem div, #headerdiv a div{
padding:10px 0;
}
#headerdiv .menitem:hover{
background-color:rgb(100,100,100);
}
ul{
margin-top:0px !important;
}

#logoimage{
margin-top:5px;
margin-bottom:5px;
height:30px;
cursor:pointer;
width:30px;
padding:0;
background-size:100% 100%;
}
#logoname{
margin-top:5px;
cursor:pointer;
margin-bottom:5px;
margin-left:10px;
height:30px;
width:100px;
background-size:100% 100%;
padding:0;
}

@media (max-width: 991px){
#headerdiv .mobitem {
text-align:left;
padding: 10px 5px !important;
border-top:thin solid black;
color:black;
}
#headerdiv .mobitem:hover {
background-color:rgb(235,235,235);
}
#headerdiv .menitem{
border:none;
}
#headerdiv{
display:none;
position:absolute;
right:0px;
top:56px;
background-color:white;
border-left: thin solid black;
border-bottom: thin solid black;
}
}
</style>
<script>
$(window).load(function(){
result = false;

markedans = new Array();
if(getCookie('testtime')=="" && localStorage.getItem("testid")!=null)
result=true;
if(result){
var quesarr = new Array();                   
for(var i=0;i<window.localStorage.getItem("totalques");i++){
markedans[i] = window.localStorage.getItem("marked"+i);
if(markedans[i]==null)
markedans[i]="";
}
qtimetaken="";
for(var ij=0;ij<window.localStorage.getItem("totalques");ij++)
qtimetaken += ","+localStorage.getItem("qtime_"+ij);
qtimetaken = qtimetaken.substr(1);
var hr = new XMLHttpRequest();
var url = "result.php";
var vars = "quesids="+JSON.stringify(JSON.parse(window.localStorage["quesids"]))+"&quesans1="+JSON.stringify(markedans)+"&testidinp="+localStorage.getItem("testid")+"&subjectname="+localStorage.getItem("subjectname")+"&qtimetaken="+qtimetaken;
localStorage.clear();
document.cookie = "testtime" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
document.cookie = "testtimeexpire" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.send(vars);
}

});

function statusChangeCallback(response) {

    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
   
      // Logged into your app and Facebook.
    } else if (response.status === 'not_authorized') {
    logout1();
      // The person is logged into Facebook, but not your app.

    } else {
    if(<?php echo isset($_SESSION['name'])?>)
        logout1();
      // The person is not logged into Facebook, so were not sure if
      // they are logged into this app or not.
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1512930255660445',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that weve initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app (connected)
  // 2. Logged into Facebook, but not your app (not_authorized)
  // 3. Not logged into Facebook and cant tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.
 
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
function logout(){
  FB.logout(function(response) {  // user is now logged out

});
logout1();
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}
function logout1(){
 	var hr = new XMLHttpRequest();
var url = "logout.php";
var vars = "id=0";
hr.open("POST", url, true);
hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
hr.onreadystatechange = function() {    
if(hr.readyState == 4 && hr.status == 200) {
window.open("index.php","_self")
}
}
hr.send(vars);
}


</script>

<div class="container-fluid col-xs-8 col-md-12" id="headerdiv"  >
  <div class="col-xs-10 hidden-xs hidden-sm  col-md-3"><div class="col-md-offset-1 col-xs-2" onclick="window.open('index.php','_self')"   id="logoimage" style='background-image :url(http://www.e-education.co.in/Logo/e-education-logo-only.png);'></div>
  <div class=" col-xs-3 col-xs-offest-2" onclick="window.open('index.php','_self')" id="logoname" style='background-image :url(http://www.e-education.co.in/Logo/e-education-yellow-only.png);'></div></div>
  <a href="index.php"><div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-md-2 menitem mobitem">Home</div></a>
 
 
 
</div>