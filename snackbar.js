// JavaScript Document
function showSnackBar() {
	var x = document.getElementById("snackbar");
	x.className = "show";
	setTimeout(function () {
		x.className = x.className.replace("show", "");
	}, 3000);
}

function showmessage(text) {
	var x = document.getElementById("snackbar");
	x.innerHTML=text;
	x.className = "show";
	setTimeout(function () {
		x.className = x.className.replace("show", "");
	}, 9000);
}


