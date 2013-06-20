// set default window height of css 
function setZenbackHeight() {
	var rightbarHeight = 2800;
	var ZenbackHeight = 400;

	var pageHeight = getPageHeight();
	pageHeight += ZenbackHeight;
	
	// adjustment of Ad box and Twitte timeline box ..and so on.
	if(pageHeight < rightbarHeight) {
		pageHeight = rightbarHeight;
	}

	U.$('main').style.height = pageHeight + "px";
}

// do when it end reading all resource
jQuery(function() {
	'use strict';

	// set window height
	// -> repeat setting to adjust Zenback box
	setZenbackHeight();
});
