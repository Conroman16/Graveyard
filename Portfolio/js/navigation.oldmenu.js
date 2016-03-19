var defaultPage = "#aboutme";
var prevURL = "";
var prevPage = "";
var windowHash = window.location.hash;


$(document).ready(function(){
	checkURL();
	if(windowHash == ""){  //if no hash is specified in URL, uppercase link with class of "def-page"
		$(".def-page").addClass("to-upper");
		prevPage = $(".def-page");
	}
	else{  //else uppercase link with href that is the same as the URL hash
		$("a[href=" + windowHash + "]").addClass("to-upper");
		prevPage = $("a[href=" + windowHash + "]");
	}
	$('ul#menu-list li a').click(function (){  //on link click, check the URL for what hash was added, lowercase previous page link and uppercase new page link
		checkURL(this.hash);
		$(prevPage).removeClass("to-upper");
		$(this).addClass("to-upper");
		prevPage = this;
	});
	setInterval("checkURL()",100);  //call checkURL 10 times a second to check for new URL hashes
});

function checkURL(hash){ 
	if(!hash){  //if URL has no hash
		hash = window.location.hash;
	}
	if(hash == ""){
		hash = defaultPage;
		loadPage(hash);
	}
	if(hash != prevURL){
		prevURL = hash;
		if(hash == "")
			$("#content-area").html(defaultPage);
		else
			loadPage(hash);
	}
}

function loadPage(url){
	url=url.replace('#page','');
	$.ajax({
		type: "POST",
		url: "loadPage.php",
		data: "page=" + url,
		success: function(msg){
			if(parseInt(msg)!=0){
				$("#content-area").html(msg);
			}
		}
	});
}