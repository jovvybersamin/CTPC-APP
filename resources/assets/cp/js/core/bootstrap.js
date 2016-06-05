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
