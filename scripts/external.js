$(document).ready(function(){
	$('.nWin').each(function(){
		var $this = $(this);
		if($this.attr("href") != "#"){
			$this.attr({
				"onclick" : "window.open(this.href);return false;"
			});
		}
	});
});

$(document).ready(function(){
	$('.aquaButton, .blackButton').each(function(){
		$(this).click(function(){
			var href = $(this).children().first().next().attr("href");
			if(href != null && href != undefined){
				document.location.href = href;
			}
		});
		$(this).attr({
			"style" : "cursor: pointer;"
		});
	});
});

$(document).ready(function(){
	$('.leftLink').each(function(){
		var $this = $(this);
		$this.attr({
			"title" : $this.text()
		});
	});
});

$(document).ready(function(){
	if($('#scrollImg').length > 0){
		$(document).keydown(function(e){
			var $keyLeft = 37;
			var $keyRight = 39;
			var $which = (e.keyCode ? e.keyCode : e.which);
			if($which == $keyLeft || $which == $keyRight){
				swapImg();
			}
		});
	}
	setInterval(function(){
		swapImg();
	}, 15000);
});