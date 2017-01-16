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
        'vendors/chartist.min.css',
        // 'vendors/nestable.css'
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
        'vendors/video.js',
        'vendors/jquery.sticky-kit.min.js',
        'vendors/masonry.pkgd.js'
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
        // 'resources/assets/js/vendors/jquery.nestable.js',
    ], 'public/js/admin-app.js');

    mix.styles([
        'vendors/notification.css'
    ], 'public/css/notification.css');
    mix.copy(['node_modules/sweetalert/dist/sweetalert.css'], 'resources/assets/css/vendors');
    mix.styles([
        'resources/assets/css/vendors/sweetalert.css'
    ], 'public/css/sweetalert.css');
    mix.copy(['node_modules/sweetalert/dist/sweetalert.min.js'], 'resources/assets/js/vendors');
    mix.scripts([
        'resources/assets/js/vendors/sweetalert.min.js',
    ], 'public/js/sweetalert.js');
    mix.styles([
        'resources/assets/css/vendors/notification.css'
    ], 'public/css/notification.css');
    mix.styles([
        'resources/assets/css/vendors/acordeon-sorteable.css'
    ], 'public/css/acordeon-sorteable.css');

    mix.scripts([
        'resources/assets/js/vendors/funciones-ajax.js',
    ], 'public/js/funciones-ajax.js');
    mix.scripts([
        'resources/assets/js/vendors/funciones_cotizacion.js',
    ], 'public/js/funciones_cotizacion.js');
    mix.scripts([
        'resources/assets/js/vendors/froala_editor.min.js',
        'resources/assets/js/vendors/plugins/align.min.js',
        'resources/assets/js/vendors/plugins/code_beautifier.min.js',
        'resources/assets/js/vendors/plugins/code_view.min.js',
        'resources/assets/js/vendors/plugins/draggable.min.js',
        'resources/assets/js/vendors/plugins/image.min.js',
        'resources/assets/js/vendors/plugins/image_manager.min.js',
        'resources/assets/js/vendors/plugins/link.min.js',
        'resources/assets/js/vendors/plugins/lists.min.js',
        'resources/assets/js/vendors/plugins/paragraph_format.min.js',
        'resources/assets/js/vendors/plugins/paragraph_style.min.js',
        'resources/assets/js/vendors/plugins/table.min.js',
        'resources/assets/js/vendors/plugins/url.min.js',
        'resources/assets/js/vendors/plugins/entities.min.js',
    ], 'public/js/funciones_froala.js');
    mix.styles([
        'resources/assets/css/vendors/froala_editor.css',
        'resources/assets/css/vendors/froala_style.css',
        'resources/assets/css/vendors/plugins/code_view.css',
        'resources/assets/css/vendors/plugins/image_manager.css',
        'resources/assets/css/vendors/plugins/image.min.css',
        'resources/assets/css/vendors/plugins/table.min.css',
        'resources/assets/css/vendors/plugins/video.min.css'
    ], 'public/css/stilos_froala.css');
    mix.styles([
        'vendors/style-freddy.css'
    ], 'public/css/style-freddy.css');
    mix.scripts([
        'resources/assets/js/vendors/funciones-checkout.js',
    ], 'public/js/funciones-checkout.js');
    mix.scripts([
        'resources/assets/js/vendors/checkout.js',
    ], 'public/js/checkout.js');
});
