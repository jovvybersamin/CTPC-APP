var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

var configurations = {
	run:{
		vendors:true,
		versions:true,
		cp:true,
		site:true
	}
}

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    vendors(mix);
    cp(mix);
    site(mix);
    versions(mix);
});


/**
 * For CP
 *
 * @param  {[type]} mix [description]
 * @return {[type]}     [description]
 */
function cp(mix){
	mix.sass('../cp/sass/cp.scss','public/backend/css/cp.css')
	   .copy('../cp/fonts','public/backend/fonts/') // This is not working I do not know why.
	   .browserify('../cp/js/app.js','public/backend/js/cp.js');
}

/**
 * For Site.
 *
 * @param  {[type]} mix [description]
 * @return {[type]}     [description]
 */
function site(mix){
	mix.sass('../site/sass/site.scss','public/frontend/css/site.css')
		.browserify('../site/js/app.js','public/frontend/js/site.js');
}

function site_vendors(mix){

}

/**
 * Consolidate all the third party assets used by the application.
 *
 * @param  MIX
 * @return void
 */
function vendors(mix){
	if(configurations.run.vendors){
		mix.copy('node_modules/sweetalert/dist','resources/assets/vendors/sweetalert/');
		mix.copy('node_modules/select2/dist','resources/assets/vendors/select2/');
		mix.styles([
			'../vendors/sweetalert/sweetalert.css',
			'../vendors/select2/css/select2.min.css'
		],'public/vendors/css');

		mix.scripts([
			'../vendors/sweetalert/sweetalert.min.js',
			'../vendors/dmuploader.js',
			// '../vendors/select2/js/select2.full.min.js'// This is already loaded in core/bootstrap.js
		],'public/vendors/js');

		// Mix the standalone vendors.
		video_js(mix);
	}
}

function video_js(mix){
	mix.copy('bower_components/video.js/dist','resources/assets/vendors/videojs/');

	mix.styles([
		'../vendors/videojs/video-js.min.css'
	],'public/vendors/css/videojs');

	mix.scripts([
		'../vendors/videojs/video.min.js'
	],'public/vendors/js/videojs');
}

/**
 *
 * @param  {[type]} mix [description]
 * @return {[type]}     [description]
 */
function versions(mix){
	mix.version([
		// Fon Control Panel assets versioning.
		'backend/css/cp.css','backend/js/cp.js',
		// For Site assets versioning.
		'frontend/css/site.css','frontend/js/site.js',
		// For Application vendors versioning.
		// ( Third Party assets.)
		'vendors/css/all.css','vendors/js/all.js',

		'vendors/css/videojs/all.css','vendors/js/videojs/all.js'
	]);
}
