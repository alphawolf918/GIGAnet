/**
 * Browser.js
 *
 * JavaScript object for capturing browser information.
 *
 */

/**
  * Browser Constructor
  */
function Browser()
{
    this.name = window.navigator.appName.toLowerCase();
    this.version = window.navigator.appVersion;
}


/**
  * Check to see if we are using Netscape.
  */
function _Browser_isNetscape()
{
    return (this.name == "netscape")
}


/**
  * Check to see if we are using InternetExplorer.
  */
function _Browser_isIE()
{
    return (this.name == "microsoft internet explorer")
}

/**
  * Get the available display height of the browser window.
  */
function _Browser_getHeight()
{
    if (this.isIE)
        return document.documentElement.clientHeight;
    else
        return window.innerHeight;
}

function _Browser_getWidth()
{
    if (this.isIE)
        return document.documentElement.clientWidth;
    else
        return window.innerWidth;
}


/**
  * Assign Prototype Methods
  */
Browser.prototype.isNetscape    = _Browser_isNetscape;
Browser.prototype.isIE          = _Browser_isIE;
Browser.prototype.getHeight     = _Browser_getHeight;
Browser.prototype.getWidth     = _Browser_getWidth;
/**
 * EventWrapper.js
 *
 * JavaScript object wrapper for browser events.
 *
 * The purpose of this object is to provide a set of browser-independent
 * APIs for accessing browser events in JavaScript.
 *
 */

/**
  * EventWrapper Constructor
  */
function EventWrapper(p_event, p_browser)
{
    // Member variables
    this.event    = p_event;
    this.browser  = p_browser;

    // Key constants
    this.key       = new Object();
    this.key.ENTER = 13;
}


/**
  * Check to see if a specific key was pressed.
  */
function _EventWrapper_isKeyPress(p_keycode)
{
    var keyCode = this.browser.isNetscape() ? this.event.which : this.event.keyCode;

    if (keyCode == p_keycode)
       return true;
    else
       return false;
}

/**
  * Return the DOM element that fired the event.
  */
function _EventWrapper_getElement()
{
    if (this.browser.isIE())
        return this.event.srcElement;
    else if (this.browser.isNetscape())
        return this.event.target;
}

/**
  * Assign Prototype Methods
  */
EventWrapper.prototype.isKeyPress    = _EventWrapper_isKeyPress;
EventWrapper.prototype.getElement    = _EventWrapper_getElement;

function fnToggle(strID, strToggleTo) {
	document.getElementById(strID).style.display = strToggleTo;
	if (strID=='MoreAlerts' && strToggleTo=='block') {
		document.getElementById("showMoreAlerts").style.display = "none";
	} else if (strID=='MoreAlerts' && strToggleTo=='none') {
		document.getElementById("showMoreAlerts").style.display = "block";
	}
}

function OpenTipsWindow(querystring) {
	LeftPosition = (screen.width) ? (screen.width)/10 : 0;
	TopPosition = (screen.height) ? (screen.height)/10 : 0;
	settings = 'menubar=no,height=424,width=600,resizable=no,scrollbars=yes'
	hWin = window.open(querystring, "Tips", settings, true);
	hWin.focus();
	if (hWin.opener == null) hWin.opener = self;
}

function handleFrameOnLoad()
{
    // Resize the iframe to fit the window

    // Figure out the height of the main document
    var doc = document;
    var docHeight = 0;
    var scrollHeight;
    var offsetHeight;
	if (doc.body)
    {
        scrollHeight = doc.body.scrollHeight;
        offsetHeight = doc.body.offsetHeight; 
        if (scrollHeight && offsetHeight)
            docHeight = Math.max(scrollHeight, offsetHeight);
        else if (scrollHeight)
            docHeight = scrollHeight;
        else if (offsetHeight)
            docHeight = offsetHeight;
    }
    var headerScrollHeight
    var headerOffsetHeight
    var headerHeight;
    headerScrollHeight = document.getElementById("header_table").offsetHeight;
    headerOffsetHeight = document.getElementById("header_table").headerScrollHeight;
    if (headerScrollHeight && headerOffsetHeight)
        headerHeight = Math.max(headerScrollHeight, headerOffsetHeight);
    else if (headerScrollHeight)
        headerHeight = headerScrollHeight;
    else if (headerOffsetHeight)
        headerHeight = headerOffsetHeight;
    document.getElementById("answer_frame").style.height = docHeight - (headerHeight) - 2;
    document.getElementById("answer_frame").style.width = "100%";
}

var qna_browser        = new Browser();
/**
  * Handle a key press release event in the question box.
  */
function handleKeyPress_QuestionBox(p_evt)
{
    var ew = new EventWrapper(p_evt, qna_browser);

    if (ew.isKeyPress(ew.key.ENTER))
    {
        var qBox = ew.getElement();
        qBox.blur();
        qBox.value = qBox.value.replace(/\s+$/,''); // Strip whitespace from end
        document.question_form.Ask.disabled = true;
   		document.question_form.submit();
        return false;
    }
    return true;
}
