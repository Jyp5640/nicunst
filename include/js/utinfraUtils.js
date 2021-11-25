function ut_formSubmit(url,jsonData) {
	
	var form = document.createElement('form');
	
	for (i in jsonData) {
		var key    = i;
		var values = jsonData[i];
		
		var objs = document.createElement('input');
		objs.setAttribute('type', 'hidden');
		objs.setAttribute('name', key);
		objs.setAttribute('value', values);
		form.appendChild(objs);
	}
	
	form.setAttribute('method', 'post');
	form.setAttribute('action', url);
	document.body.appendChild(form);
	form.submit();
}
function ut_paramWindow(url,jsonData,options) {
	var target = "newWindow";
	
	var form = document.createElement('form');
	
	for (i in jsonData) {
		var key    = i;
		var values = jsonData[i];
		
		var objs = document.createElement('input');
		objs.setAttribute('type', 'hidden');
		objs.setAttribute('name', key);
		objs.setAttribute('value', values);
		form.appendChild(objs);
	}
	
	var width  = options["width"];
	var height = options["height"];
	
	window.open('', target, 'width=' + width +',height=' + height + ',resizeable,scrollbars');
	
	form.setAttribute('method', 'post');
	form.setAttribute('action', url);
	form.setAttribute('target', target);
	document.body.appendChild(form);
	form.submit();
}
function ut_isNull(obj) {
	if (obj == undefined || obj == null || obj == "")
		return true;
	else 
		return false;
}
