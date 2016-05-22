var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

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
    cp(mix);
});


/**
 * For CP
 *
 * @param  {[type]} mix [description]
 * @return {[type]}     [description]
 */
function cp(mix){
	mix.sass('../cp/sass/cp.scss','public/cp/css/cp.css')
	   .copy('../cp/fonts','public/cp/fonts/') // This is not working I do not why.
	   .browserify('../cp/js/cp.js','public/cp/js/cp.js')
	   .version(['cp/css/cp.css','cp/js/cp.js']);
}

function site(){

}

