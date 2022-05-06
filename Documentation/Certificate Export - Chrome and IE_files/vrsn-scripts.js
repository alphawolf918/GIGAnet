function addEvent(obj, evType, fn){ 
 if (obj.addEventListener){ 
   obj.addEventListener(evType, fn, false); 
   return true; 
 } else if (obj.attachEvent){ 
   var r = obj.attachEvent("on"+evType, fn); 
   return r; 
 } else { 
   return false; 
 } 
}

function tabSel(id){
	switch (id){
		case 'pl1': 
			document.getElementById(id).style.display='block';
			document.getElementById('pl2').style.display='none';
			document.getElementById('pl3').style.display='none';
			document.getElementById('pc1').className='sel';
			if(document.getElementById('pc2') != null){
				document.getElementById('pc2').className='';
			}
			if(document.getElementById('pc3') != null){
				document.getElementById('pc3').className='';
			}
			break;
		case 'pl2': 
			document.getElementById(id).style.display='block';
			document.getElementById('pl1').style.display='none';
			document.getElementById('pl3').style.display='none';
			if(document.getElementById('pc1') != null){
				document.getElementById('pc1').className='';
			}
			document.getElementById('pc2').className='sel';
			if(document.getElementById('pc3') != null){
				document.getElementById('pc3').className='';
			}
			break;
		case 'pl3': 
			document.getElementById(id).style.display='block';
			document.getElementById('pl1').style.display='none';
			document.getElementById('pl2').style.display='none';
			if(document.getElementById('pc1') != null){
				document.getElementById('pc1').className='';
			}
			if(document.getElementById('pc2') != null){
				document.getElementById('pc2').className='';
			}
			document.getElementById('pc3').className='sel';
			break;
	}
}

function hideExternalUrlRefs() {
	var popup = document.getElementById("external-url-popup");
	if(popup) {
		popup.style.display = "none";
	}
	else {
		alert("The external url popup could not be found.");
	}

	return;
}

function showExternalUrlRefs() {
	var popup = document.getElementById("external-url-popup");
	if(popup) {
		popup.style.display = "block";
	}
	else {
		alert("The external url popup could not be found.");
	}

	return;
}
