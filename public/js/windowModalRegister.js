function toggle(elem) {
	// Quel est l'état ?
	state = document.getElementById(elem).style.visibility;
	if (state == "hidden") {
		document.getElementById(elem).style.visibility = "visible";
	} else {
		document.getElementById(elem).style.visibility = "hidden";
	}
}