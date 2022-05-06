// FROM: https://cdn.verisign.com/authweb/global/assets/shared/js/jquery.cacheimage.js
/*
 * cacheImage: a jQuery plugin
 *
 * cacheImage is a simple jQuery plugin for pre-caching images.  The
 * plugin can be used to eliminate flashes of unstyled content (FOUC) and
 * improve perceived page load time.  Callbacks for load, error and abort
 * events are provided.
 *
 * For usage and examples, visit:
 * http://github.com/alexrabarts/jquery-cacheimage
 *
 * Licensed under the MIT:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright (c) 2008 Stateless Systems (http://statelesssystems.com)
 *
 * @author   Alex Rabarts (alexrabarts -at- gmail -dawt- com)
 * @requires jQuery v1.2 or later
 * @version  0.2.1
 */
(function ($) {
	$.extend($, {
		cacheImage: function (src, options) {
			if (typeof src === 'object') {
				$.each(src, function () {
					$.cacheImage(String(this), options);
				});
				return;
			}
			var image = new Image();
			options = options || {};
			$.each(['load', 'error', 'abort'], function () { // Callbacks
				var e = String(this);
				if (typeof options[e] === 'function') { $(image).bind(e, options[e]); }
				if (typeof options.complete === 'function') {
					$(image).bind(e, options.complete);
				}
			});
			image.src = src;
			return image;
		}
	});
	$.extend($.fn, {
		cacheImage: function (options) {
			return this.each(function () {
				$.cacheImage(this.src, options);
			});
		}
	});
})(jQuery);
// FROM: https://cdn.verisign.com/authweb/global/assets/shared/js/jquery.boxshadow.js
/* **
* jquery-boxshadow.js
*
* $(object).boxshadow({
*     hOffset : 3,
*     vOffset : 3,
*     shadowblur : 3,
*     color : '#808080'
* })
*
* If you are using this with IE, you should set your object's background-color,
* otherwise the shadow is applied to all objects within your object as well.
*
*/
$.fn.boxshadow = function(options) {
var defaults = {
hOffset : 3,
vOffset : 3,
shadowblur : 3,
color : '#808080'
}
// Extend our default options with those provided.
var opts = $.extend(defaults, options);
var shadowVal = opts['hOffset'] + "px "+ opts['vOffset'] + "px " + opts['shadowblur'] + "px " + opts['color'];
if ((opts['hOffset'] > 0) && (opts['vOffset'] < 0)) { var direction = 45; var strength = opts['hOffset']; }
if ((opts['hOffset'] < 0) && (opts['vOffset'] > 0)) { var direction = -145; var strength = opts['hOffset'] * -1; }
if ((opts['hOffset'] > 0) && (opts['vOffset'] > 0)) { var direction = 145; var strength = opts['hOffset']; }
if ((opts['hOffset'] < 0) && (opts['vOffset'] < 0)) { var direction = -45; var strength = opts['hOffset'] * -1; }
var filterVal = "progid:DXImageTransform.Microsoft.Shadow(color='" + opts['color'] + "', Direction=" + direction + ", Strength=" + strength + ")"
if ($.browser.opera) {
$(this).css("box-shadow",shadowVal);
} else if ($.browser.webkit) {
$(this).css("-webkit-box-shadow",shadowVal);
} else if ($.browser.mozilla) {
$(this).css("-moz-box-shadow",shadowVal);
} else if ($.browser.msie) {
$(this).css("filter",filterVal);
}
}
// FROM: https://cdn.verisign.com/authweb/global/assets/header/js/header.js
/*******************************************
 **			 Header functions 			  **
 *******************************************/
//----------------------------------------//
//Load Defaults when DOM is finished loading
//----------------------------------------//
// Rob put values in the actual form elements for ease of translation
var defaultSearchVal = $("#gsa_input").val();
var defaultAccountVal = $("#myacc_input").val();
var defaultSupportVal = $("#support_input").val();
var noText = /[a-z0-9]/i;
//----------------------------------------//
//		Google search functionality
//----------------------------------------//
/*
$("#frmsearch input#gsa_input").focusin(function(){
	if($(this).val() == defaultSearchVal){
		$(this).val("");
		//Set the color to #000000 for search terms
		$(this).css({color:"#000000"});
	}
});
$("#frmsearch input#gsa_input").focusout(function(){
	if($(this).val().match(noText)===null){
		$(this).val(defaultSearchVal);
		//Set the color to #666666 for invitation text
		$(this).css({color:"#666666"});
	}
});
*/
//----------------------------------------//
//		Main Navigation functionality
//----------------------------------------//
//Cache images for main nav
$.cacheImage([
	'/apps/infocenter/sites/verisign/images/nav_grad.png',
	'/apps/infocenter/sites/verisign/images/nav_left.png',
	'/apps/infocenter/sites/verisign/images/nav_right.png',
	'/apps/infocenter/sites/verisign/images/arrow_red.png',
	'/apps/infocenter/sites/verisign/images/arrow_white.png'
	]
);
// FROM: https://cdn.verisign.com/authweb/global/assets/header/js/flyouts.js
//----------------------------------------//
// My Account M-flyout form functionality
//----------------------------------------//
$("#myacc_search_btn").click(function(){
	//document.getElementById();
	$("#myacc_search").submit();
});
$("#myacc_search input#myacc_input").click(function(){
	if($(this).val() == defaultAccountVal){
		$(this).val("");
		//Set the color to #000000 for search terms
		$(this).css({color:"#000000"});
	}
});
$("#myacc_search input#myacc_input").focusout(function(){
	if($(this).val().match(noText)===null){
		$(this).val(defaultAccountVal);
		//Set the color to #666666 for invitation text
		$(this).css({color:"#666666"});
	}

});
$("#myacc_search").submit(function(){
	var sVal = trim(document.getElementById("myacc_input").value);
	$("#myacc_input").val(sVal);
});
$("#partner_login").submit(function(){
	var uVal = trim(document.getElementById("partner_username").value);
	var pVal = trim(document.getElementById("partner_password").value);
	$("#partner_username").val(uVal);
	$("#partner_password").val(pVal);
});
//----------------------------------------//
// Support M-flyout form functionality
//----------------------------------------//
$("#support_search_btn").click(function(){
	$("#supportfrmsearch").submit();
});
$("#supportNavflyout").focus(function(){
	window.doTimeout = true;
})
$("#support_input").click(function(){
	if($(this).val() == defaultSupportVal){
		$(this).val("");
		//Set the color to #000000 for search terms
		$(this).css({color:"#000000"});
	}
	clearHightlight("support-error");
});
$("#support_input").focusout(function(){
	if($(this).val().match(noText)===null){
		$(this).val(defaultSupportVal);
		//Set the color to #666666 for invitation text
		$(this).css({color:"#666666"});
	}
});
$("#support_dd").change(function(){
	if ($(this).val() == "") {
		$(this).css({
			color: "#666"
		});
	}
	else {
		//Set the color to #666666 for invitation text
		$(this).css({
			color: "#000"
		});
	}
});
$("#support_dd").click(function(){
	clearHightlight("support-error");
});
$("#supportfrmsearch").submit(function(){
	return validateSupport();
});
function validateSupport(){
	var supportValid = true;
	if (getFieldValue("support_dd") == "") {
		highlightError("support-error");
		supportValid =  false;
	}
	if(getFieldValue("support_input").match(noText)===null || getFieldValue("support_input") == defaultSupportVal){
		highlightError("support-error");
		supportValid =  false;
	}
	if(supportValid === true){
		buildSupportUrl();
	}
	return false;
}
function highlightError(myError){
	$("#support-error").css("visibility","visible");
}
function clearHightlight(myError){
	$("#support-error").css("visibility","hidden");
}

/*
 Values for supportUrlStart and supportUrlLocale are set server-side in tne locale's content file and
 set in javascript at the top of the global support flyout include.
 If they are wrong on your site, check the content file.
*/
function buildSupportUrl(){
	var productDirectory = ""+$("#support_dd").val();
	var mySearchVal = $("#support_input").val();
	var supportUrlEnd = "/index?page=answers&startover=y&ichbox[]="+supportUrlLocale+"&question_box=" + mySearchVal;
	supportUrl = supportUrlStart + productDirectory + supportUrlEnd;
	top.location = supportUrl;
}
//----------------------------------------//
//Country selector show/hide functionality
//----------------------------------------//
$("#global-header #quick_links a.change_country").click(function () {
	$("#global-header #quick_links .country_box").toggle();
	return false;
});

$("#global-header #quick_links a.closeBox").click(function () {
	$("#global-header #quick_links .country_box").toggle();
	return false;
});

$("body").click(function () {
	$("#global-header #quick_links .country_box").hide();
});

//----------------------------------------//
// Flyout display functionality
//----------------------------------------//
var activeFlyoutId = "";
var activeNavId = "";
var activeTimer = "";
var doTimeout = true;

var myUrl = top.location.href;

if(typeof(liveHost)=="undefined"){
	liveHost = "";
}

var isDotCom = (((liveHost == "verisign.com") || (myUrl.indexOf("kb-verisign-dev2.bbtest.net") >= 0) || (myUrl.indexOf("kb-verisign-stg.bbtest.net") >= 0) || (myUrl.indexOf("knowledge.verisign.com") >= 0)) && (myUrl.indexOf("/in/") < 0) && (myUrl.indexOf("/ca/") < 0) && (myUrl.indexOf("/latinamerica/") < 0) && (myUrl.indexOf("/cl/") < 0) && (myUrl.indexOf("/mx/") < 0) && (myUrl.indexOf("/ar/") < 0) && (myUrl.indexOf("/ca/") < 0) && (myUrl.indexOf("/ar/") < 0));

function activateFlyout(myFlyoutId,myNavId){
	if(isDotCom){
		return false;
	}
	$myFlyout = $("#"+myFlyoutId);
	killFlyout(myFlyoutId,myNavId); // if there's another flyout active, hide it
	activeFlyoutId = myFlyoutId; // set the current flyout id as the active one for hiding (see above)
	activeNavId = myNavId; // set the associated nav id as the active one (not used currently)
	$myFlyout.css("display","block").hover(function(){
		clearTimeout(activeTimer);
	});
	$("#"+myFlyoutId+" input").hover(function(){
		clearTimeout(activeTimer);
	});
	$("#"+myFlyoutId+" select").hover(function(){
		clearTimeout(activeTimer);
	});
	$myFlyout.mouseleave(function(){
		setNavTimeout(); // set the timer to hide flyouts, etc, that aren't needed.
	});

	activateNav(myNavId); // set associated nav elements to reflect active nav state.
}
function killFlyout(myFlyoutId,myNavId){ // if there's another flyout active, hide it
	if((activeFlyoutId != "")&&(activeFlyoutId != myFlyoutId)){
		deactivateFlyout(activeFlyoutId);
	}
}
function deactivateFlyout(myFlyoutId){ // flyout and associated elements show inactive state
	if (activeFlyoutId !== "") {
		document.getElementById(myFlyoutId).style.display = "none";
		activeFlyoutId = "";
		deactivateNav(activeNavId);
	}
}
function activateNav(myNavId){
	$myNav = $("#"+myNavId);
	$myAnchor = $("#"+myNavId+ " a");
	$mySpan = $("#"+myNavId+ " a span.nav-arrow");
	if(($myNav).hasClass("left")){
		$myAnchor.css({backgroundPosition: "left -25px", color: "#333"});
	}
	else{
		$myAnchor.css({backgroundPosition: "right -25px", color: "#333"});
	}
	$mySpan.removeClass("nav-arrow").addClass("nav_arrow_active");
}
function deactivateNav(myNavId){
	$myNav = $("#"+myNavId);
	$myAnchor = $("#"+myNavId+ " a");
	$mySpan = $("#"+myNavId+ " a span.nav_arrow_active");
	if(($myNav).hasClass("left")){
		$myAnchor.css({backgroundPosition: "top left", color: "#333"});
	}
	else{
		$myAnchor.css({backgroundPosition: "top right", color: "#333"});
	}
	$mySpan.removeClass("nav_arrow_active").addClass("nav-arrow");
}
function setNavTimeout(){
	if(doTimeout === true){
		var timoutTime = "500";
		clearTimeout(activeTimer);
		activeTimer = setTimeout("deactivateFlyout('"+activeFlyoutId+"')", timoutTime);
	}
}
$("#main li").each(function(){

	/* hover intent config /*
	 *
	 */

	doNavIn = function(){
		window.activateFlyout(myFlyoutId,myId);
		clearTimeout(activeTimer);
	}

	doNavOut = function(){
		return true;
	}

	var config = {
		 over: doNavIn, // function = onMouseOver callback (REQUIRED)
		 timeout: 500, // number = milliseconds delay before onMouseOut
		 out: doNavOut // function = onMouseOut callback (REQUIRED)
};

	var myId = this.id;
	var myFlyoutId = myId + "flyout";
	var myAnchorId = myId + "anchor";
	var mySpanId = myId + " a span.nav-arrow";

	$("#" + myId + "a").attr("id",myAnchorId);
	$('<span class="nav-arrow" id="'+mySpanId+'"></span>').appendTo("#"+myId+" a");

	$(this).hoverIntent(config);

	$(this).mouseleave(function(){
		window.setNavTimeout();
	});

	$(".flyout select").click(function(){ //prevent IE from closing the flyout while the user is choosing an option
		if (document.all) {
			clearTimeout(activeTimer);
			doTimeout = false;
		}
	})
	$(".flyout select").blur(function(){ //prevent IE from closing the flyout while the user is choosing an option
		if (document.all) {
			doTimeout = true;
		}
	})

	$(".flyout select").change(function(){
		$("#supportNavflyout").focus();
	})

});
// FROM: https://cdn.verisign.com/authweb/global/assets/shared/js/oo-engine.js
/* OnlineOpinion (S3tS v3.1) */
/* This product and other products of OpinionLab, Inc. are protected by U.S. Patent No. 6606581, 6421724, 6785717 B1 and other patents pending. */
var custom_var,_sp='%3A\\/\\/',_rp='%3A//',_poE=0.0, _poX=0.0,_sH=screen.height,_d=document,_w=window,_ht=escape(_w.location.href),_hr=_d.referrer,_tm=(new Date()).getTime(),_kp=0,_sW=screen.width;function _fC(_u){_aT=_sp+',\\/,\\.,-,_,'+_rp+',%2F,%2E,%2D,%5F';_aA=_aT.split(',');for(i=0;i<5;i++){eval('_u=_u.replace(/'+_aA[i]+'/g,_aA[i+5])')}return _u};function O_LC(){_w.open('https://secure.opinionlab.com/ccc01/comment_card.asp?time1='+_tm+'&time2='+(new Date()).getTime()+'&prev='+_fC(escape(_hr))+'&referer='+_fC(_ht)+'&height='+_sH+'&width='+_sW+'&custom_var='+custom_var,'comments','width=535,height=192,screenX='+((_sW-535)/2)+',screenY='+((_sH-192)/2)+',top='+((_sH-192)/2)+',left='+((_sW-535)/2)+',resizable=yes,copyhistory=yes,scrollbars=no')};function _fPe(){if(Math.random()>=1.0-_poE){O_LC();_poX=0.0}};function _fPx(){if(Math.random()>=1.0-_poX)O_LC()};window.onunload=_fPx;function O_GoT(_p){_d.write('<a href=\'javascript:O_LC()\'>'+_p+'</a>');_fPe()}
// FROM: https://cdn.verisign.com/authweb/global/assets/shared/js/google-analytics.js
var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-295855-1']);
	_gaq.push(['_setDomainName', '.verisign.com']);
	_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
// FROM: https://cdn.verisign.com/authweb/global/assets/header/js/jquery.autocomplete.js
/*
 * jQuery Autocomplete plugin 1.1
 *
 * Copyright (c) 2009 Jörn Zaefferer
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Revision: $Id: jquery.autocomplete.js 15 2009-08-22 10:30:27Z joern.zaefferer $
 */
;(function($) {

$.fn.extend({
	autocomplete: function(urlOrData, options) {
		var isUrl = typeof urlOrData == "string";
		options = $.extend({}, $.Autocompleter.defaults, {
			url: isUrl ? urlOrData : null,
			data: isUrl ? null : urlOrData,
			delay: isUrl ? $.Autocompleter.defaults.delay : 10,
			max: options && !options.scroll ? 10 : 150
		}, options);

		// if highlight is set to false, replace it with a do-nothing function
		options.highlight = options.highlight || function(value) { return value; };

		// if the formatMatch option is not specified, then use formatItem for backwards compatibility
		options.formatMatch = options.formatMatch || options.formatItem;

		return this.each(function() {
			new $.Autocompleter(this, options);
		});
	},
	result: function(handler) {
		return this.bind("result", handler);
	},
	search: function(handler) {
		return this.trigger("search", [handler]);
	},
	flushCache: function() {
		return this.trigger("flushCache");
	},
	setOptions: function(options){
		return this.trigger("setOptions", [options]);
	},
	unautocomplete: function() {
		return this.trigger("unautocomplete");
	}
});
$.Autocompleter = function(input, options) {
	var KEY = {
		UP: 38,
		DOWN: 40,
		DEL: 46,
		TAB: 9,
		RETURN: 13,
		ESC: 27,
		COMMA: 188,
		PAGEUP: 33,
		PAGEDOWN: 34,
		BACKSPACE: 8
	};
	// Create $ object for input element
	var $input = $(input).attr("autocomplete", "off").addClass(options.inputClass);
	var timeout;
	var previousValue = "";
	var cache = $.Autocompleter.Cache(options);
	var hasFocus = 0;
	var lastKeyPressCode;
	var config = {
		mouseDownOnSelect: false
	};
	var select = $.Autocompleter.Select(options, input, selectCurrent, config);

	var blockSubmit;

	// prevent form submit in opera when selecting with return key
	$.browser.opera && $(input.form).bind("submit.autocomplete", function() {
		if (blockSubmit) {
			blockSubmit = false;
			return false;
		}
	});

	// only opera doesn't trigger keydown multiple times while pressed, others don't work with keypress at all
	$input.bind(($.browser.opera ? "keypress" : "keydown") + ".autocomplete", function(event) {
		// a keypress means the input has focus
		// avoids issue where input had focus before the autocomplete was applied
		hasFocus = 1;
		// track last key pressed
		lastKeyPressCode = event.keyCode;
		switch(event.keyCode) {

			case KEY.UP:
				event.preventDefault();
				if ( select.visible() ) {
					select.prev();
				} else {
					onChange(0, true);
				}
				break;

			case KEY.DOWN:
				event.preventDefault();
				if ( select.visible() ) {
					select.next();
				} else {
					onChange(0, true);
				}
				break;

			case KEY.PAGEUP:
				event.preventDefault();
				if ( select.visible() ) {
					select.pageUp();
				} else {
					onChange(0, true);
				}
				break;

			case KEY.PAGEDOWN:
				event.preventDefault();
				if ( select.visible() ) {
					select.pageDown();
				} else {
					onChange(0, true);
				}
				break;

			// matches also semicolon
			case options.multiple && $.trim(options.multipleSeparator) == "," && KEY.COMMA:
			case KEY.TAB:
			case KEY.RETURN:
				if( selectCurrent() ) {
					// stop default to prevent a form submit, Opera needs special handling
					event.preventDefault();
					blockSubmit = true;
					return false;
				}
				break;

			case KEY.ESC:
				select.hide();
				break;

			default:
				clearTimeout(timeout);
				timeout = setTimeout(onChange, options.delay);
				break;
		}
	}).focus(function(){
		// track whether the field has focus, we shouldn't process any
		// results if the field no longer has focus
		hasFocus++;
	}).blur(function() {
		hasFocus = 0;
		if (!config.mouseDownOnSelect) {
			hideResults();
		}
	}).click(function() {
		// show select when clicking in a focused field
		if ( hasFocus++ > 1 && !select.visible() ) {
			onChange(0, true);
		}
	}).bind("search", function() {
		// TODO why not just specifying both arguments?
		var fn = (arguments.length > 1) ? arguments[1] : null;
		function findValueCallback(q, data) {
			var result;
			if( data && data.length ) {
				for (var i=0; i < data.length; i++) {
					if( data[i].result.toLowerCase() == q.toLowerCase() ) {
						result = data[i];
						break;
					}
				}
			}
			if( typeof fn == "function" ) fn(result);
			else $input.trigger("result", result && [result.data, result.value]);
		}
		$.each(trimWords($input.val()), function(i, value) {
			request(value, findValueCallback, findValueCallback);
		});
	}).bind("flushCache", function() {
		cache.flush();
	}).bind("setOptions", function() {
		$.extend(options, arguments[1]);
		// if we've updated the data, repopulate
		if ( "data" in arguments[1] )
			cache.populate();
	}).bind("unautocomplete", function() {
		select.unbind();
		$input.unbind();
		$(input.form).unbind(".autocomplete");
	});


	function selectCurrent() {
		var selected = select.selected();
		if( !selected )
			return false;

		var v = selected.result;
		previousValue = v;

		if ( options.multiple ) {
			var words = trimWords($input.val());
			if ( words.length > 1 ) {
				var seperator = options.multipleSeparator.length;
				var cursorAt = $(input).selection().start;
				var wordAt, progress = 0;
				$.each(words, function(i, word) {
					progress += word.length;
					if (cursorAt <= progress) {
						wordAt = i;
						return false;
					}
					progress += seperator;
				});
				words[wordAt] = v;
				// TODO this should set the cursor to the right position, but it gets overriden somewhere
				//$.Autocompleter.Selection(input, progress + seperator, progress + seperator);
				v = words.join( options.multipleSeparator );
			}
			v += options.multipleSeparator;
		}

		$input.val(v);
		hideResultsNow();
		$input.trigger("result", [selected.data, selected.value]);
		return true;
	}

	function onChange(crap, skipPrevCheck) {
		if( lastKeyPressCode == KEY.DEL ) {
			select.hide();
			return;
		}

		var currentValue = $input.val();

		if ( !skipPrevCheck && currentValue == previousValue )
			return;

		previousValue = currentValue;

		currentValue = lastWord(currentValue);
		if ( currentValue.length >= options.minChars) {
			$input.addClass(options.loadingClass);
			if (!options.matchCase)
				currentValue = currentValue.toLowerCase();
			request(currentValue, receiveData, hideResultsNow);
		} else {
			stopLoading();
			select.hide();
		}
	};

	function trimWords(value) {
		if (!value)
			return [""];
		if (!options.multiple)
			return [$.trim(value)];
		return $.map(value.split(options.multipleSeparator), function(word) {
			return $.trim(value).length ? $.trim(word) : null;
		});
	}

	function lastWord(value) {
		if ( !options.multiple )
			return value;
		var words = trimWords(value);
		if (words.length == 1)
			return words[0];
		var cursorAt = $(input).selection().start;
		if (cursorAt == value.length) {
			words = trimWords(value)
		} else {
			words = trimWords(value.replace(value.substring(cursorAt), ""));
		}
		return words[words.length - 1];
	}

	// fills in the input box w/the first match (assumed to be the best match)
	// q: the term entered
	// sValue: the first matching result
	function autoFill(q, sValue){
		// autofill in the complete box w/the first match as long as the user hasn't entered in more data
		// if the last user key pressed was backspace, don't autofill
		if( options.autoFill && (lastWord($input.val()).toLowerCase() == q.toLowerCase()) && lastKeyPressCode != KEY.BACKSPACE ) {
			// fill in the value (keep the case the user has typed)
			$input.val($input.val() + sValue.substring(lastWord(previousValue).length));
			// select the portion of the value not typed by the user (so the next character will erase)
			$(input).selection(previousValue.length, previousValue.length + sValue.length);
		}
	};
	function hideResults() {
		clearTimeout(timeout);
		timeout = setTimeout(hideResultsNow, 200);
	};
	function hideResultsNow() {
		var wasVisible = select.visible();
		select.hide();
		clearTimeout(timeout);
		stopLoading();
		if (options.mustMatch) {
			// call search and run callback
			$input.search(
				function (result){
					// if no value found, clear the input box
					if( !result ) {
						if (options.multiple) {
							var words = trimWords($input.val()).slice(0, -1);
							$input.val( words.join(options.multipleSeparator) + (words.length ? options.multipleSeparator : "") );
						}
						else {
							$input.val( "" );
							$input.trigger("result", null);
						}
					}
				}
			);
		}
	};
	function receiveData(q, data) {
		if ( data && data.length && hasFocus ) {
			stopLoading();
			select.display(data, q);
			autoFill(q, data[0].value);
			select.show();
		} else {
			hideResultsNow();
		}
	};
	function request(term, success, failure) {
		if (!options.matchCase)
			term = term.toLowerCase();
		var data = cache.load(term);
		// recieve the cached data
		if (data && data.length) {
			success(term, data);
		// if an AJAX url has been supplied, try loading the data now
		} else if( (typeof options.url == "string") && (options.url.length > 0) ){

			var extraParams = {
				timestamp: +new Date()
			};
			$.each(options.extraParams, function(key, param) {
				extraParams[key] = typeof param == "function" ? param() : param;
			});

			$.ajax({
				// try to leverage ajaxQueue plugin to abort previous requests
				mode: "abort",
				// limit abortion to this input
				port: "autocomplete" + input.name,
				dataType: options.dataType,
				url: options.url,
				data: $.extend({
					q: lastWord(term),
					limit: options.max
				}, extraParams),
				success: function(data) {
					var parsed = options.parse && options.parse(data) || parse(data);
					cache.add(term, parsed);
					success(term, parsed);
				}
			});
		} else {
			// if we have a failure, we need to empty the list -- this prevents the the [TAB] key from selecting the last successful match
			select.emptyList();
			failure(term);
		}
	};

	function parse(data) {
		var parsed = [];
		var rows = data.split("\n");
		for (var i=0; i < rows.length; i++) {
			var row = $.trim(rows[i]);
			if (row) {
				row = row.split("|");
				parsed[parsed.length] = {
					data: row,
					value: row[0],
					result: options.formatResult && options.formatResult(row, row[0]) || row[0]
				};
			}
		}
		return parsed;
	};
	function stopLoading() {
		$input.removeClass(options.loadingClass);
	};
};
$.Autocompleter.defaults = {
	inputClass: "ac_input",
	resultsClass: "ac_results",
	loadingClass: "ac_loading",
	minChars: 1,
	delay: 400,
	matchCase: false,
	matchSubset: true,
	matchContains: false,
	cacheLength: 10,
	max: 100,
	mustMatch: false,
	extraParams: {},
	selectFirst: true,
	formatItem: function(row) { return row[0]; },
	formatMatch: null,
	autoFill: false,
	width: 0,
	multiple: false,
	multipleSeparator: ", ",
	highlight: function(value, term) {
		return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi, "\\$1") + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
	},
		scroll: true,
		scrollHeight: 180
};
$.Autocompleter.Cache = function(options) {
	var data = {};
	var length = 0;

	function matchSubset(s, sub) {
		if (!options.matchCase)
			s = s.toLowerCase();
		var i = s.indexOf(sub);
		if (options.matchContains == "word"){
			i = s.toLowerCase().search("\\b" + sub.toLowerCase());
		}
		if (i == -1) return false;
		return i == 0 || options.matchContains;
	};

	function add(q, value) {
		if (length > options.cacheLength){
			flush();
		}
		if (!data[q]){
			length++;
		}
		data[q] = value;
	}

	function populate(){
		if( !options.data ) return false;
		// track the matches
		var stMatchSets = {},
			nullData = 0;
		// no url was specified, we need to adjust the cache length to make sure it fits the local data store
		if( !options.url ) options.cacheLength = 1;

		// track all options for minChars = 0
		stMatchSets[""] = [];

		// loop through the array and create a lookup structure
		for ( var i = 0, ol = options.data.length; i < ol; i++ ) {
			var rawValue = options.data[i];
			// if rawValue is a string, make an array otherwise just reference the array
			rawValue = (typeof rawValue == "string") ? [rawValue] : rawValue;

			var value = options.formatMatch(rawValue, i+1, options.data.length);
			if ( value === false )
				continue;

			var firstChar = value.charAt(0).toLowerCase();
			// if no lookup array for this character exists, look it up now
			if( !stMatchSets[firstChar] )
				stMatchSets[firstChar] = [];
			// if the match is a string
			var row = {
				value: value,
				data: rawValue,
				result: options.formatResult && options.formatResult(rawValue) || value
			};

			// push the current match into the set list
			stMatchSets[firstChar].push(row);
			// keep track of minChars zero items
			if ( nullData++ < options.max ) {
				stMatchSets[""].push(row);
			}
		};
		// add the data items to the cache
		$.each(stMatchSets, function(i, value) {
			// increase the cache size
			options.cacheLength++;
			// add to the cache
			add(i, value);
		});
	}

	// populate any existing data
	setTimeout(populate, 25);

	function flush(){
		data = {};
		length = 0;
	}

	return {
		flush: flush,
		add: add,
		populate: populate,
		load: function(q) {
			if (!options.cacheLength || !length)
				return null;
			/*
			 * if dealing w/local data and matchContains than we must make sure
			 * to loop through all the data collections looking for matches
			 */
			if( !options.url && options.matchContains ){
				// track all matches
				var csub = [];
				// loop through all the data grids for matches
				for( var k in data ){
					// don't search through the stMatchSets[""] (minChars: 0) cache
					// this prevents duplicates
					if( k.length > 0 ){
						var c = data[k];
						$.each(c, function(i, x) {
							// if we've got a match, add it to the array
							if (matchSubset(x.value, q)) {
								csub.push(x);
							}
						});
					}
				}
				return csub;
			} else
			// if the exact item exists, use it
			if (data[q]){
				return data[q];
			} else
			if (options.matchSubset) {
				for (var i = q.length - 1; i >= options.minChars; i--) {
					var c = data[q.substr(0, i)];
					if (c) {
						var csub = [];
						$.each(c, function(i, x) {
							if (matchSubset(x.value, q)) {
								csub[csub.length] = x;
							}
						});
						return csub;
					}
				}
			}
			return null;
		}
	};
};
$.Autocompleter.Select = function (options, input, select, config) {
	var CLASSES = {
		ACTIVE: "ac_over"
	};

	var listItems,
		active = -1,
		data,
		term = "",
		needsInit = true,
		element,
		list;

	// Create results
	function init() {
		if (!needsInit)
			return;
		element = $("<div/>")
		.hide()
		.addClass(options.resultsClass)
		.css("position", "absolute")
		.appendTo(document.body);

		list = $("<ul/>").appendTo(element).mouseover( function(event) {
			if(target(event).nodeName && target(event).nodeName.toUpperCase() == 'LI') {
							active = $("li", list).removeClass(CLASSES.ACTIVE).index(target(event));
					$(target(event)).addClass(CLASSES.ACTIVE);
					}
		}).click(function(event) {
			$(target(event)).addClass(CLASSES.ACTIVE);
			select();
			// TODO provide option to avoid setting focus again after selection? useful for cleanup-on-focus
			input.focus();
			return false;
		}).mousedown(function() {
			config.mouseDownOnSelect = true;
			$("#frmsearch input#gsa_input").data("autocompleteClicked",true);
		}).mouseup(function() {
			config.mouseDownOnSelect = false;
		});

		if( options.width > 0 )
			element.css("width", options.width);

		needsInit = false;
	}

	function target(event) {
		var element = event.target;
		while(element && element.tagName != "LI")
			element = element.parentNode;
		// more fun with IE, sometimes event.target is empty, just ignore it then
		if(!element)
			return [];
		return element;
	}
	function moveSelect(step) {
		listItems.slice(active, active + 1).removeClass(CLASSES.ACTIVE);
		movePosition(step);
				var activeItem = listItems.slice(active, active + 1).addClass(CLASSES.ACTIVE);
				if(options.scroll) {
						var offset = 0;
						listItems.slice(0, active).each(function() {
				offset += this.offsetHeight;
			});
						if((offset + activeItem[0].offsetHeight - list.scrollTop()) > list[0].clientHeight) {
								list.scrollTop(offset + activeItem[0].offsetHeight - list.innerHeight());
						} else if(offset < list.scrollTop()) {
								list.scrollTop(offset);
						}
				}
	};

	function movePosition(step) {
		active += step;
		if (active < 0) {
			active = listItems.size() - 1;
		} else if (active >= listItems.size()) {
			active = 0;
		}
	}

	function limitNumberOfItems(available) {
		return options.max && options.max < available
			? options.max
			: available;
	}

	function fillList() {
		list.empty();
		var max = limitNumberOfItems(data.length);
		for (var i=0; i < max; i++) {
			if (!data[i])
				continue;
			var formatted = options.formatItem(data[i].data, i+1, max, data[i].value, term);
			if ( formatted === false )
				continue;
			var li = $("<li/>").html( options.highlight(formatted, term) ).addClass(i%2 == 0 ? "ac_even" : "ac_odd").appendTo(list)[0];
			$.data(li, "ac_data", data[i]);
		}
		listItems = list.find("li");
		if ( options.selectFirst ) {
			listItems.slice(0, 1).addClass(CLASSES.ACTIVE);
			active = 0;
		}
		// apply bgiframe if available
		if ( $.fn.bgiframe )
			list.bgiframe();
	}

	return {
		display: function(d, q) {
			init();
			data = d;
			term = q;
			fillList();
		},
		next: function() {
			moveSelect(1);
		},
		prev: function() {
			moveSelect(-1);
		},
		pageUp: function() {
			if (active != 0 && active - 8 < 0) {
				moveSelect( -active );
			} else {
				moveSelect(-8);
			}
		},
		pageDown: function() {
			if (active != listItems.size() - 1 && active + 8 > listItems.size()) {
				moveSelect( listItems.size() - 1 - active );
			} else {
				moveSelect(8);
			}
		},
		hide: function() {
			element && element.hide();
			listItems && listItems.removeClass(CLASSES.ACTIVE);
			active = -1;
		},
		visible : function() {
			return element && element.is(":visible");
		},
		current: function() {
			return this.visible() && (listItems.filter("." + CLASSES.ACTIVE)[0] || options.selectFirst && listItems[0]);
		},
		show: function() {
			var offset = $(input).offset();
			element.css({
				width: typeof options.width == "string" || options.width > 0 ? options.width : $(input).width(),
				top: offset.top + input.offsetHeight,
				left: offset.left
			}).show();
						if(options.scroll) {
								list.scrollTop(0);
								list.css({
					maxHeight: options.scrollHeight,
					overflow: 'auto'
				});

								if($.browser.msie && typeof document.body.style.maxHeight === "undefined") {
					var listHeight = 0;
					listItems.each(function() {
						listHeight += this.offsetHeight;
					});
					var scrollbarsVisible = listHeight > options.scrollHeight;
										list.css('height', scrollbarsVisible ? options.scrollHeight : listHeight );
					if (!scrollbarsVisible) {
						// IE doesn't recalculate width when scrollbar disappears
						listItems.width( list.width() - parseInt(listItems.css("padding-left")) - parseInt(listItems.css("padding-right")) );
					}
								}

						}
		},
		selected: function() {
			var selected = listItems && listItems.filter("." + CLASSES.ACTIVE).removeClass(CLASSES.ACTIVE);
			return selected && selected.length && $.data(selected[0], "ac_data");
		},
		emptyList: function (){
			list && list.empty();
		},
		unbind: function() {
			element && element.remove();
		}
	};
};
$.fn.selection = function(start, end) {
	if (start !== undefined) {
		return this.each(function() {
			if( this.createTextRange ){
				var selRange = this.createTextRange();
				if (end === undefined || start == end) {
					selRange.move("character", start);
					selRange.select();
				} else {
					selRange.collapse(true);
					selRange.moveStart("character", start);
					selRange.moveEnd("character", end);
					selRange.select();
				}
			} else if( this.setSelectionRange ){
				this.setSelectionRange(start, end);
			} else if( this.selectionStart ){
				this.selectionStart = start;
				this.selectionEnd = end;
			}
		});
	}
	var field = this[0];
	if ( field.createTextRange ) {
		var range = document.selection.createRange(),
			orig = field.value,
			teststring = "<->",
			textLength = range.text.length;
		range.text = teststring;
		var caretAt = field.value.indexOf(teststring);
		field.value = orig;
		this.selection(caretAt, caretAt + textLength);
		return {
			start: caretAt,
			end: caretAt + textLength
		}
	} else if( field.selectionStart !== undefined ){
		return {
			start: field.selectionStart,
			end: field.selectionEnd
		}
	}
};
})(jQuery);


function linkPopUp(url) {
	 var scrWidth = parseInt(screen.width/1.035);
	 var scrHeight = parseInt(screen.height/1.35);
	 var winWidth = 800;
	 var winHeight = 550;

	 if (scrWidth <= winWidth) {
			winWidth = scrWidth;
			var winLeft = 0;
	 } else {
			var winLeft = parseInt((scrWidth - winWidth)/2);
	 }

	 if (scrHeight <= winHeight) {
			winHeight = scrHeight;
			var winTop = 0;
	 } else {
			var winTop = scrHeight - winHeight;
	 }
	 popupWin = window.open(url, 'pdfWin', 'width=' + winWidth + ',height=' + winHeight + ',top=' + winTop + ',left=' + winLeft + ',screenY=' + winTop + ',screenX=' + winLeft + ',resizable,scrollbars,location,menubar,toolbar');
	 popupWin.focus();
	}

function linkPop() {
	 var exturlPresent;
	 var siteName=document.links[0].hostname;
	 for(i=0;i<document.links.length;i++){
			var linkList=document.links[i].href;
		var linkHost=document.links[i].hostname;
			var pdfPresent=linkList.indexOf(".pdf");
			var intlPresent = linkList.indexOf("verisign.");
		var clarifyPresent=linkList.indexOf("go.cgi");
		var vipPresent = linkList.indexOf("forms/vipowp.html");
		var pptPresent=linkList.indexOf(".ppt");
		var jsPresent=linkList.indexOf("javascript");
		var mailtoPresent=linkList.indexOf("mailto");
		var isExternal = linkHost.indexOf(myHost);

		if (linkHost != siteName && jsPresent+mailtoPresent == -2){
				 exturlPresent="yes";
		}else{
		 exturlPresent="no";
			}
			
			if (intlPresent > 0) {
				exturlPresent="no";
			}
			
			if ((isExternal < 0) && (jsPresent < 0) && (mailtoPresent < 0)) {
				exturlPresent="yes";
			}

			if(linkHost == "securitycenter.verisign.com") {
				exturlPresent="no";
			}
			if(linkHost == "www.verisign.tv") {
				exturlPresent="yes";
			}
			if(linkHost == "ssl-certificate-center.verisign.com") {
				exturlPresent="no";
			}
			if(linkHost == "ssl-certificate-center-enterprise.verisign.com") {
				exturlPresent="no";
			}
			if(linkHost == "knowledge.verisign.com") {
				exturlPresent="no";
			}
			if(linkHost == "research.verisign.com") {
				exturlPresent="no";
			}
			if(linkHost == "c.moreover.com") {
				exturlPresent="no";
			}

			if (pdfPresent>0 || clarifyPresent>0 || vipPresent>0 || pptPresent>0 || exturlPresent=="yes"){
		document.links[i].onclick = function() {
			linkPopUp(this.href);
			return false;
		}

			}
	 }
}

$(document).ready(function(){
	//linkPop(); // disabled for support pages
});

    var shownFooterNav = false;
    var clickedTitle = false;
        
    $(".clicker").click(function(){
        tempId = this.id;
        footerNavId = this.id + "Links";
            showHideFooterNav(footerNavId,this.id);
        });
                
    
    function doPlus(footerTitle){
        tempHtml = $("#"+footerTitle).html();
        tempHtml = tempHtml.replace("-","+");
        $("#"+footerTitle).html(tempHtml);
    }
    function doMinus(footerTitle){
        tempHtml = $("#"+footerTitle).html();
        tempHtml = tempHtml.replace("+","-");
        $("#"+footerTitle).html(tempHtml);
    }        
    
    function showHideFooterNav(myFooterNav,myClickedTitle){
        if(shownFooterNav){
            $("#"+shownFooterNav).removeClass("shown").addClass("hidden");
            doPlus(clickedTitle);
            if(shownFooterNav == myFooterNav){
                shownFooterNav = false;
                clickedTitle = false;
                return false;
            }                     
        }

        $("#"+myFooterNav).removeClass("hidden").addClass("shown");
        doMinus(myClickedTitle);
        
        shownFooterNav = myFooterNav;
        clickedTitle = myClickedTitle;

    }