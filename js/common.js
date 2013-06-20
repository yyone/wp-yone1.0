var category_icon = [
	[1,  'home'],
	[2,  'it'],
	[10,  'programming'],
	[3,  'web_design'],
	[4,  'apple'],
	[5,  'photo'],
	[6,  'book'],
	[7,  'movie'],
	[8,  'marketing'],
	[9,  'bicycle'],
	[11, 'life']
];

/* 
  movement of mouseover
  ⇒ I can not get parameter to event handler,
	so change code that get event handler to function.
*/

function category_icon_hover_event(e) {
	'use strict';

	// for old browzer
	if(typeof e == 'undefined') e = window.event;
	var target = e.target || e.srcElement;

	if(target.nodeName == "A") {
		var div_node = target.getElementsByTagName('div')[0];
		var parent_li = target.parentNode;
	} else if (target.nodeName == "DIV") {
		var div_node = target;
		var parent_li = target.parentNode.parentNode;
	} else if (target.nodeName == "SPAN") {
		var div_node = target.parentNode.getElementsByTagName('div')[0];
		var parent_li = target.parentNode.parentNode;
	} else {
		return false;
	}

	var num = 0;
	for(var i=0, count=category_icon.length; i<count; i++) {
		if(parent_li.getAttribute('id') == "menu_"+category_icon[i][1]) {
			num = category_icon[i][0];
			break;
		}
	}
	var width = (((num - 1) == 0) ? 0 : (num - 1)) * (-25);

	if(e.type == 'mouseover') {
		div_node.style.backgroundPosition = width + 'px -25px';
	} else {
		div_node.style.backgroundPosition = width + 'px   0px';
	}
}

// delete default text in search box
function change_input_css(e) {
	'use strict';

	// for old browzer
	if(typeof e == 'undefined') e = window.event;
	var target = e.target || e.srcElement;

	// set css
	if(e.type == 'focus') {
		if(target.value == "Search by Keywords") {
			target.value = "";
		}
		target.style.color = "#000";
		target.style.fontSize = "18px";
		target.style.top = "5px";
	} else if(e.type == 'blur') {
		if(target.value.length == 0) {
			target.value = "Search by Keywords";
			target.style.color = "#BBBBBB";
			target.style.fontSize = "14px";
			target.style.top = "7px";
		}
	}
}

// set window height of css 
function getPageHeight() {
	var pageHeight;
	
	var yScroll;
	// get inner height
	if(window.innerHeight && window.scrollMaxY) {
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if(document.body.scrollHeight > document.body.offsetHeight) {  // all but Explorer Mac
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		yScroll = document.body.offsetHeight;
	}

	var windowHeight;
	// get window height
	if(self.innerHeight) { // all except Explorer
		windowHeight = self.innerHeight;
	} else if(document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowHeight = document.documentElement.clientHeight;
	} else { // other explorer
		windowHeight = document.body.clientHeight;
	}

	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}
	
	//alert('yScroll = ' + yScroll + ' windowHeight = ' + windowHeight + ' heightSize = ' + pageHeight);
	return pageHeight;
}

// set default window height of css 
function setPageHeight() {
	var rightbarHeight = 2300;

	var pageHeight = getPageHeight();

	// adjustment of Ad box and Twitte timeline box ..and so on.
	if(pageHeight < rightbarHeight) {
		pageHeight = rightbarHeight;
	}

	U.$('main').style.height = pageHeight + "px";
}

// do when it end reading DOM
jQuery(function() {
	'use strict';

	// set window height
	setPageHeight();
});

// do when it end reading all resource
window.onload = function() {
	'use strict';

	// Handler for search box
	U.addEvent(U.$('search_text'), 'focus', change_input_css);
	U.addEvent(U.$('search_text'), 'blur', change_input_css);

	// Handler for new collapsArch box
	addExpandCollapse(
		'newCollapsArchWidget',
		'<div class="expand_indicator"></div>',
		'<div class="collapse_indicator"></div>',
		1
	); // id, expandSym, collapseSym, accordion

	// Handler for display of sub level category
	// set jQuery.ready method because of too late onload event
	jQuery('#left li.menu_icon').hover(
		function() {jQuery(this).children('ul').show();},
		function() {jQuery(this).children('ul').hide();}
	);

	// Handler for mousehover event of category icon
	for(var i=0, count=category_icon.length; i<count; i++) {
		var a_node = U.$('menu_'+category_icon[i][1]).getElementsByTagName('a')[0];

		U.addEvent(a_node, 'mouseover', category_icon_hover_event);
		U.addEvent(a_node, 'mouseout', category_icon_hover_event);
	}
	for(var i=0, count=category_icon.length; i<count; i++) {
		var a_node = U.$('menu_'+category_icon[i][1]).getElementsByTagName('a')[0];
		var div_node = a_node.getElementsByTagName('div')[0];
		var span_node = a_node.getElementsByTagName('span')[0];

		U.addEvent(div_node, 'mouseover', category_icon_hover_event);
		U.addEvent(span_node, 'mouseover', category_icon_hover_event);
	}
};
