function showPassword() {
	document.getElementById("wideEye").style.visibility="visible";
	document.getElementById("closedEye").style.visibility="hidden";

	var x=document.getElementById("userPassword");
	if(x.type=="password") {
		x.type="text";
	}
}

function hidePassword() {
	document.getElementById("wideEye").style.visibility="hidden";
	document.getElementById("closedEye").style.visibility="visible";

	var x=document.getElementById("userPassword");
	if(x.type=="text") {
		x.type="password";
	}
}


function hideError() {
	document.getElementsByClassName("error").style.visibility=hidden;
}