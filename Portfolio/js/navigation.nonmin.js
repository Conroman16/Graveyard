var defaultPage = "#intro";
var prevURL = "";
var prevPage = "";
var prevMenuItem = "";
var currMenuItem = "";
var windowHash = window.location.hash;
var loggedIn = 0;


$(document).ready(function(){
	checkURL();
	if(windowHash == ""){  //if no hash is specified in URL, uppercase link with class of "def-page"
		$(".def-page").addClass("to-upper");
		$(".def-page .menu-item").addClass("menu-item-selected");
		prevPage = $(".def-page");
		prevMenuItem = $(".def-page .menu-item");
	}
	else{  //else uppercase link with href that is the same as the URL hash
		$("a[href=" + windowHash + "]").addClass("to-upper");
		$("a[href=" + windowHash + "] .menu-item").addClass("menu-item-selected");
		prevPage = $("a[href=" + windowHash + "]");
		prevMenuItem = $("a[href=" + windowHash + "] .menu-item");
	}
	$("#menu-wrapper a").click(function (){  //on link click, check the URL for what hash was added, lowercase previous page link and uppercase new page link
		checkURL(this.hash);
		$(prevPage).removeClass("to-upper");
		$(prevMenuItem).removeClass("menu-item-selected");
		$(this).addClass("to-upper");
		$(this.firstChild).addClass("menu-item-selected");
		prevPage = this;
		prevMenuItem = this.firstChild;
	});
	setInterval("checkURL()",100);  //call checkURL 10 times a second to check for new URL hashes
});

function checkURL(hash){ //check the URL to see if the hash has changed
	if(prevURL == "" && !hash){
		console.log("I'm in the 'if' that loads the default page");
		prevURL = defaultPage;
		hash = defaultPage;
		loadPage(defaultPage);
	}
	else if(prevURL == ""){
		console.log("I'm in the 'else if' that loads the hash when URL entered already has one.");
		prevURL = hash;
		loadPage(hash);
	}
	else if(hash != prevURL){
		console.log("I'm in the 'else if' that loads the page when the prevURL is not the same as the current hash.");
		prevURL = hash;
		loadPage(hash);
	}
	else{
		console.log("I'm in the 'else' meaning that the has specified did not meet any of the conditions.");
		return;
	}
	/*if(!hash){  //if URL has no hash
		hash = window.location.hash;
		prevURL = defaultPage;
	}
	else if(hash == ""){  //if URL has empty hash (e.g. first time site is loaded)
		hash = defaultPage;
		prevURL = defaultPage;
		loadPage(hash);
	}
	if(hash != prevURL){  //if hash exists in URL
		if(hash == ""){
			prevURL = defaultPage;
			loadpage(defaultPage);
		}
		else{
			prevURL = hash;
			loadPage(hash);
		}
	}*/
}

function loadPage(url){
	url = url.replace(getHash(),'');
	$.ajax({
		type: "POST",
		url: "loadPage.php",
		data: "page=" + url,
		success: function(msg){
			if(parseInt(msg)!=0){
				$("#content-area").html(msg);
				//prevURL = url;
				//console.log("Previous URL after content area is loaded: " + prevURL);
			}
		}
	});
}

function getHash(){
	var h = window.location.hash;
	return h;
}

function checkCookie(){
	var userData = getCookie("username");
	if (userData != ""){
		loggedIn = 1;
	}
	else{
		loggedIn = 0;
	}
}

function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++){
		var c = ca[i].trim();
		if (c.indexOf(name)==0)
			return c.substring(name.length,c.length);
	}
	return "";
}