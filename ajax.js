function Ajax(module, parms, callBack){
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			if(callBack) callBack(request.responseText);
		}
	}
	
	var parameters = "module=" + module;
	for(var k in parms){
		parameters += '&'+k+'='+encodeURIComponent(parms[k]);
	}
	
	request.open('POST', 'ajaxinterface.php', true);
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(parameters);
}