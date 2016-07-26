window.cp_url = function(url){
	// By leaving of the specific protocol (keep the double slashes). the resource
	// will be serve whichever protocol currently being used.
	// For e.g. ( Current protocal http:)
	// This will leave us a http://whatever.com this also applies to https
	// https://whatever.com
	url = '//' + App.siteRoot + '/cp/' + url;
	return url;
}

window.site_url = function(url){
	url = '//' + App.siteRoot + '/' + url;
	return url;
}

window.resource_url = function(url){
	url = '//' + App.siteRoot + '/build/backend/' + url;
	return url;
}

