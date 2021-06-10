









function eye() {
	if (document.getElementById("password").type == "text") 
	{ document.getElementById("password").type = "password"; 
	document.getElementById("eye").style.color = "#ccc";
	 document.getElementById("eye").className = "fa fa-eye-slash"; }
	else {
		document.getElementById("password").type = "text"; document.getElementById("eye").className = "fa fa-eye";
		document.getElementById("eye").style.color = "black";
	}




}
function eyeslash() {
	document.getElementById("eye").className = "fa fa-eye-slash";
	document.getElementById("password").type = "password";
	document.getElementById("eye").style.color = "rgb(148, 148, 148)";
}
