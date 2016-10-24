const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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
    mix.sass('app.scss')
        .version(['public/css/app.css']);
    mix.copy('node_modules/materialize-css/dist/fonts', 'public/fonts');
    mix.copy([
        'node_modules/materialize-css/dist/js/materialize.min.js',
        'node_modules/materialize-css/node_modules/jquery/dist/jquery.min.js'
    ], 'resources/assets/js/vendors');

    mix.scripts([
        'vendors/jquery.min.js',
        'vendors/materialize.min.js'
    ], 'public/js/app.js');
});
