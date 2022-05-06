//REFERENCE PAGE TAG
// CONSTANTS
var ct = "<img src=";
var cd = "//vs.symantec.com"; //this should contain the domain of the web site
var cu = "/images/zag.gif?Log=1"; //this should contain the full path to the zag.gif file (excluding domain) and include the query string of log=1

//Ted Garvey's Code to prevent onclick issues for knowledge.symantec.com
/*
$(function () {
	$('#pc1').click(function (e) {tabSel('pl1');});
	$('#pc2').click(function (e) {tabSel('pl2');});
	$('#pc3').click(function (e) {tabSel('pl3');});
});

//End Ted's Code
*/
var ce = ">";
var onsitedomain = "symantec.com";

var url = window.location.toString();
var domain = url.replace('http://','').replace('https://','').replace('www.','').split(/[/?#]/)[0];
if (domain.indexOf('norton.com')  >= 0)  {
	var cd = "//vs.ws.norton.com"; //this should contain the domain of the web site
	var onsitedomain = "norton.com";
}

var c = {};
c["sw"] = screen.width;
c["sh"] = screen.height;
c["cd"] = screen.colorDepth;
var co = "";

for ( cKey in c ) {
	co = co+"&"+cKey+"="+escape1(c[cKey]);
}
document.write(ct,cd,cu,co,ce);

var d = {};
d["dt"] = document.title;
d["dr"] = document.referrer;
d["cb"] = new Date().getTime();
var vo = "";

if (typeof v != "undefined") {
	for ( vKey in v ) {
		vo = vo+"&"+vKey+"="+escape1(v[vKey]);
	}
}
for ( dKey in d ) {
	vo = vo+"&"+dKey+"="+escape2(d[dKey]);
}
document.write(ct,cd,cu,vo,ce);
//END REFERENCE PAGE TAG


//REFERENCE LINK AND FORM CLICK PAGE TAG
//INITIATE FUNCTIONS ONLOAD
//window.onload = startCapture;

function startCapture(){
	
	//TO CAPTURE LINK CLICKS
	if (vlc == "1"){captureLink();}
	
}

//BEGIN LINK CAPTURE PAGE TAG
function captureLink(){
	if (document.links[0]){
	if (document.links){
	var links = document.links, link, k=0;
	while(link=links[k++])	
	link.onclick = captureLinkName;
	}
	}
}
function captureLinkName() {
	var lc=new Image();
	this.parent = this.parentNode;
	lc.src= cd + cu + '&linkname=' + escape1(this.name) + "&cd=" + new Date().getTime();
}

//ESCAPE FUNCTIONS
function escape1(s)
{ return escape(s).replace(/\+/g,"%20") }

function escape2(s)
{ return escape(s).replace(/\+/g, "%2B") }

//start Rob C code from Eric
function linktag() {
        var tagstring = cd + cu + '&tagtype=exit&linkname=' + escape(this.innerHTML) + '&linkhref=' + escape(this.href) + "&cd=" + new Date().getTime();
       	var lcc = new Image();
	this.parent = this.parentNode;
	lcc.src= tagstring;
}


if (document.links) {
  var links=document.links;
  for (var i = 0; i < links.length; i++) {
    var linkobj=links[i];
    var linkurl = linkobj.href.toLowerCase();
    if(linkurl.indexOf("javascript:") < 0){ // added this conditional so we don't break JS hrefs -- rperez
	    var urlwoprot = linkurl.substring(linkurl.indexOf('//') + 2);
	    var linkdomain = urlwoprot.substring(0, urlwoprot.indexOf('/'));
	    if (linkdomain.indexOf(onsitedomain)== -1) {
	      linkobj.onclick = linktag;      
	    } 
    }
  }
}
//end Rob C code
    
//END LINK CAPTURE PAGE TAG

//start netmining code
/*
(function() {
  var h = 'com-verisign.netmng.com';
  var t = document.createElement('script');
  t.type = 'text/javascript'; t.async = true;
  var p = 'https:'==document.location.protocol?'https://':'http://';
  var m = document.referrer.match(/https?:\/\/([a-z]+\.[a-z\.]+)/i);
  var r = (m && m[1] != document.location.hostname) ? ('&ref=' + escape(document.referrer)) : '';
  t.src = p + h + '/?async=1' + r;
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(t, s);
})();
*/
//end netmining code