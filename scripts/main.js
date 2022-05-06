function changeTitle(newTitle){
	$(document).ready(function(){
		document.title = "GIGAnet // " + newTitle;
	});
}

function loadDatePicker(id,strDate){
	$(document).ready(function(){
		$('#'+id).datepicker({
			dateFormat : "yy-mm-dd",
			showAnim : "clip",
			currentText : strDate,
			autoSize: true,
			weekends : false
		});
	});
}

function loadPDF(){
	location.href = 'file://///n7700/giga/HR/pto.pdf';
}

function swapImg(){
	$(document).ready(function(){
		var $src = $('#scrollImg').attr("src");
		var $newSrc = ($src.indexOf("carharttdeal-1") != -1) ? "carharttdeal-2" : "carharttdeal-1";
		$('#scrollImg').attr("src", "docs/" + $newSrc + ".png");
	});
}