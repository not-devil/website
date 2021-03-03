// JS code for sub-sections
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
$('.pop-up').hide();

$('#home').hide();
var w=$(window).width();
function pop(key){
	var subsection='subsection/'+key+'.html';
	$('#phone-nav-back').hide();
	if($(window).width()<700){
		$('#home').fadeOut();
		$(".menu-right ,.menu-left").css({'display':'none'});
	}
	else {
		$('#home').fadeIn();
	}
	$(".content-box").hide().load(subsection).fadeIn(1000);
	u="?sect="+key;
	history.pushState("", "", u);

	$('#overlay').fadeOut(500);
	$('.pop-up').fadeIn(1000);

	$(".menu-left").addClass("menul");
	$(".menu-right").addClass("menur");
}

if(location.search.indexOf('sect=')>=0)
	{
		pop(getParameterByName('sect'));
	}


$(document).ready(function(){
	$(document).ajaxStart(function(){
	    $("#wait").css("display", "block");
	});

	$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
	});
});

function closepop(){
	$('.pop-up').fadeOut(500);
	$('#overlay').fadeIn(1000);
	if($(window).width()<700){
		$(".menur ,.menul").css({'display':'block','top':'19em'});
		$(".menul ul li").css({'transform':'rotateY(15deg)','padding':'1px'});
		$(".menur ul li").css({'transform':'rotateY(-15deg)','padding':'1px'});
	}
	else {
		$('#home').fadeOut();
	}
	$(".menu-left").removeClass("menul");
	$(".menu-right").removeClass("menur");
}

$("#navigation :button").click(function() {
	$(".menur,.menul").css({'top':"0"});
	$(".menur ul li,.menul ul li").css({'transform':'rotateY(0deg)','padding':'5px'});
	$("#home,.menur ,.menul,#phone-nav-back").fadeToggle();
});

if(w<700){
$("#home :button").click(function() {
	$("#phone-nav-back,#home").fadeToggle();
});
}


