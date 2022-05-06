/* 
InstantService Smart Button Integration
VeriSign, Inc
Developer: Josh Santomieri (jsantomieri@verisign.com, joshs@santsys.com)
Date: 1/8/2010
    
Requirements:
This script requires jQuery (http://www.jquery.com).  
*/


function SmartButtonHandler() {

	var self = this;

	this.parse = function() {
		$('div[type=smartbutton]').each(function(i, n) {

			var obj = $(this);
			if (!obj)
				return;

			var dept = obj.attr("dept");
			var queue = obj.attr("queue");

			if (dept == null || queue == null)
				return;

			if (dept.match(/[0-9]+/) && queue.match(/[0-9]+/)) {

				var src = "//rs.instantservice.com/resources/smartbutton/" + dept + "/" + queue + "/available.gif?" + Math.round(new Date().getTime())

				var img = $('<img id="' + n.id + '_img" style="display:none;" src="' + src + '" />');
				img.error(function() { showUnavail(n.id) });
				img.load(function() { showAvail(n.id) });

				$("body").append(img);
			}
		});
	}

	function showAvail(id) {
		$("#" + id).show();
		$("#" + id + " > span[type=avail]").show();
		$("#" + id + " > span[type=unavail]").hide();
	}

	function showUnavail(id) {
		$("#" + id).show();
		$("#" + id + " > span[type=avail]").hide();
		$("#" + id + " > span[type=unavail]").show();
	}
}

function openInParent(url) {
	if (window && window.opener) {
		window.opener.location.href = url;
		window.close();
	}
	else if (window && window.parent) {
		window.parent.location = url;
	}
	else if (document) {
		document.location = url;
	}
}

function openWnd(url, width, height) {
	if (window) {
		window.open(url, "", "resizeable=yes,scrollbars=yes,height=" + height + ",width=" + width);
	}
}

$(document).ready(function() {
	var smartBtns = new SmartButtonHandler();
	smartBtns.parse();
});