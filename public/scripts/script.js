var span = document.getElementsByTagName('span');

/*
 * On every span tag on the page we are adding event which triggers 
 * showInformation function, because var span is an array we use for loop
 */
for (var i = 0; i < span.length; i++) {
	span[i].addEventListener("mouseover", showInformation, false);
}

var xPos, yPos;

/*
 * Creates XMLHttpRequest object and sends information via POST method
 * to ajax_response.php script page.
 * More precisely it takes the value of <span> tag from private_page.php as a string,
 * that value is $user (event.target.firstChild.data), then it is used 
 * as $username in database query for geting information.
 */ 
function showInformation(event) {
	if (window.XMLHttpRequest) {
		var xhr = new XMLHttpRequest();
	}

	xPos = event.clientX; // Taking the mouse position
	yPos = event.clientY; // It's position where informations will be shown

	xhr.open("POST", "../includes/ajax_response.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			content(xhr, event);
		}
	};
	
	xhr.send("uname=" + event.target.firstChild.data);
}

/*
 * Uses hidden div with id="displayInformation" to show information at a place
 * of mouse cursor on screen, parseInt are used to get just the numeric value
 * from xPos and yPos.
 * We are using xml to pass data with ajax.
 */
function content(xhr, event) {
	var info = document.getElementById('displayInformation');
	var xmlResponse = xhr.responseXML;
	var xmlDocumentElement = xmlResponse.documentElement;
	var message = xmlDocumentElement.firstChild.data;
	info.innerHTML = message;
	info.style.top = parseInt(yPos) + 2 + "px";
	info.style.left = parseInt(xPos) + 2 + "px";
	info.style.visibility = "visible";
	event.target.addEventListener("mouseout", function() {
		document.getElementById('displayInformation').style.visibility = "hidden";
	}, false);
}
