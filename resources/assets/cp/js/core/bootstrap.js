/**
 * Load Vue and Vue-Resource.
 *
 * Vue is the javascript framework use by CTPC
 */

if(window.Vue == undefined){
	window.Vue = require('vue');
}

Vue.config.debug = true;

require('vue-resource');

Vue.http.headers.common['X-CSRF-TOKEN'] = App.csrfToken;


/**
 * Load jQuery and Bootstrap jQuery, used for front-end interactions.
 */

if(window.$ === undefined || window.jQuery === undefined){
	window.$ = window.jQuery = require('jquery');
}

$(function(){
	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN':App.csrfToken
		}
	});
});

if(window.$.select2 === undefined || window.jQuery.select2 === undefined){
	require('select2/dist/js/select2.full.min.js');
}

if(window._ === undefined){
	window._ = require('underscore');
}

window.Promise = require('promise');


require('bootstrap-sass/assets/javascripts/bootstrap');

// Load the forms.
require('./forms/bootstrap');

// load the Control Panel functions.
require('./../cp.js');
// Load the Control Panel JS Theme.
require('./../theme/theme');
