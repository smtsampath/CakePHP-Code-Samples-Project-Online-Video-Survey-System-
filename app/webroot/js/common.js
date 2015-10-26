function hoverOff(hoverElement) {
	hoverElement.className = "hoverOff";
}
function hoverOn(hoverElement) {
	hoverElement.className = "hoverOn";
}

function clickclear(thisfield, defaulttext) {
	if (thisfield.value == defaulttext) {
		thisfield.value = "";
	}
}
function clickrecall(thisfield, defaulttext) {
	if (thisfield.value == "") {
		thisfield.value = defaulttext;
	}
}
