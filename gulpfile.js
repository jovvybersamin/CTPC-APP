var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

var configurations = {
	run:{
		vendors:true
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
	mix.sass('../cp/sass/cp.scss','public/cp/css/cp.css')
	   .copy('../cp/fonts','public/cp/fonts/') // This is not working I do not know why.
	   .browserify('../cp/js/app.js','public/cp/js/cp.js');
}

function site(){

}

/**
 * Consolidate all the third party assets used by thee application.
 *
 * @param  MIX
 * @return void
 */
function vendors(mix){
	if(configurations.run.vendors){
		mix.copy('node_modules/sweetalert/dist','resources/assets/vendors/sweetalert/');
		mix.styles([
			'../vendors/sweetalert/sweetalert.css'
		],'public/vendors/css');

		mix.scripts([
			'../vendors/sweetalert/sweetalert.min.js'
		],'public/vendors/js');
	}
}

/**
 *
 * @param  {[type]} mix [description]
 * @return {[type]}     [description]
 */
function versions(mix){
	mix.version([
		// Fon Control Panel assets versioning.
		'cp/css/cp.css','cp/js/cp.js',
		// For Site assets versioning.
		//
		// For Application vendors versioning.
		// ( Third Party assets.)
		'vendors/css/all.css','vendors/js/all.js'
	]);
}
