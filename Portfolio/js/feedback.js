$("form.form input#feedback-submitBtn").click(function(){
	var fullname = document.getElementById("fullName");
	var email = document.getElementById("emailAddress");
	var message = document.getElementById("message");
	if (fullname.vale == ""){
		alert("You must either enter a name or 'Anonymous'!");
		$(fullname).addClass("red-highlight");
		$("div.form-container div#errorNotice").removeClass("hidden");
		return false;
	}
	else if (email.value == ""){
		alert("You must enter either en email address or 'Anonymous'!");
		$(email).addClass("red-highlight");
		$("div.form-container div#errorNotice").removeClass("hidden");
		return false;
	}
	else if (message.value == ""){
		alert("You must enter a message!");
		$(message).addClass("red-highlight");
		$("div.form-container div#errorNotice").removeClass("hidden");
		return false;
	}
	else{
		$("div.form-container div#errorNotice").addClass("hidden");
		$("#feedback-form").submit();
	}
});