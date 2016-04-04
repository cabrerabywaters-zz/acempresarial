var elixir = require('laravel-elixir');

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

	//mix.browserify('main.js');
    mix.sass('app.scss')
    .styles(
            [
            'dropzone/dist/min/dropzone.min.css', 
            'AdminLTE/dist/css/AdminLTE.min.css',
            'AdminLTE/dist/css/skins/_all-skins.min.css',
            'AdminLTE/plugins/iCheck/square/blue.css'   

            ], 'public/css/compiled/allVendor.css', 'vendor/bower/'
        )
    .scripts(
            [                
            	'dropzone/dist/min/dropzone.min.js', 
            	'AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
            	'AdminLTE/plugins/fastclick/fastclick.js',
            	'AdminLTE/dist/js/app.min.js',
            	'AdminLTE/dist/js/demo.js',
            	'AdminLTE/plugins/iCheck/icheck.min.js'


            ], 'public/js/compiled/allVendor.js', 'vendor/bower/'
        )
    .version([
    		'public/css/compiled/allVendor.css',
            'public/js/compiled/allVendor.js',            
        ])
});