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
        'node_modules/materialize-css/css/admin/materialize.css',
        'node_modules/materialize-css/css/admin/style.css',

        'node_modules/materialize-css/js/plugins/perfect-scrollbar/perfect-scrollbar.css',
        'node_modules/materialize-css/js/plugins/jvectormap/jquery-jvectormap.css',
        'node_modules/materialize-css/js/plugins/chartist-js/chartist.min.css',

    ], 'resources/assets/css/vendors');

    mix.styles([
        'vendors/owl.carousel.css',
        'vendors/owl.theme.css'
    ], 'public/css/carousel.css');

    mix.styles([
        'vendors/materialize.css',
        'vendors/style.css',
        'vendors/perfect-scrollbar.css',
        'vendors/jquery-jvectormap.css',
        'vendors/chartist.min.css'
    ], 'public/css/admin-theme.css');

    mix.styles([
        'vendors/pdf.css'
    ], 'public/css/quotes-pdf.css');

    mix.copy([
        'node_modules/materialize-css/dist/js/materialize.js',
        'node_modules/materialize-css/node_modules/jquery/dist/jquery.min.js',

        <!--scrollbar-->
        'node_modules/materialize-css/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        <!-- chartjs -->
        'node_modules/materialize-css/js/plugins/chartist-js/chartist.min.js',
        <!-- chartjs -->
        'node_modules/materialize-css/js/plugins/chartjs/chart.min.js',
        'node_modules/materialize-css/js/plugins/chartjs/chart-script.js',
        <!-- sparkline -->
        'node_modules/materialize-css/js/plugins/sparkline/jquery.sparkline.min.js',
        'node_modules/materialize-css/js/plugins/sparkline/sparkline-script.js',

        <!--jvectormap-->
        'node_modules/materialize-css/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'node_modules/materialize-css/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'node_modules/materialize-css/js/plugins/jvectormap/vectormap-script.js',

        <!--google map-->
        'node_modules/materialize-css/js/plugins/google-map/google-map-script.js',


    ], 'resources/assets/js/vendors');

    mix.scripts([
        'vendors/jquery.min.js',
        'vendors/materialize.js',
        'vendors/owl.carousel.js',
        'vendors/video.js'
    ], 'public/js/app.js');

    mix.scripts([
        <!--scrollbar-->
        'vendors/perfect-scrollbar.min.js',
        <!-- chartjs -->
        // 'vendors/chartist.min.js',
        // <!-- chartjs -->
        // 'vendors/chart.min.js',
        // 'vendors/chart-script.js',
        // <!-- sparkline -->
        'vendors/jquery.sparkline.min.js',
        'vendors/sparkline-script.js',
        <!--jvectormap-->
        // 'vendors/jquery-jvectormap-1.2.2.min.js',
        // 'vendors/jquery-jvectormap-world-mill-en.js',
        // 'vendors/vectormap-script.js',
        <!--google map-->
        // 'vendors/google-map-script.js',
    ], 'public/js/admin-app.js');

    mix.styles([
        'vendors/notification.css'
    ], 'public/css/notification.css');

});
