window.cp_url = function(url){
	// By leaving of the specific protocol (keep the double slashes). the resource
	// will be serve whichever protocol currently being used.
	url = '//' + App.siteRoot + '/cp/' + url;
	return url;
}


