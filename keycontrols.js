document.getElementsByTagName("html")[0].onkeyup = function(e){
	console.log(e.keyCode);
	switch(e.keyCode){
		case 32:
			// Space
			if(slideControl.isPaused()) slideControl.play();
			else slideControl.pause();
			break;
		case 38:
			// Up arrow
			slideControl.previous();
			break;
		case 40:
			// Down arrow
			slideControl.next();
			break;
		case 83:
			// s
			triggerSale();
			break;
		case 67:
			// c
			triggerCake();
			break;
		case 78:
			// n
			triggerNews();
			break;
	}
}