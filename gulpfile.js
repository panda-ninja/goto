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
        'node_modules/materialize-css/js/plugins/data-tables/css/jquery.dataTables.min.css',
        'node_modules/materialize-css/js/plugins/dropify/css/dropify.min.css',
        'node_modules/sweetalert/dist/sweetalert.css'
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
        'vendors/jquery.dataTables.min.css',
        'vendors/dropify.min.css',
        'vendors/customize.css',
        'vendors/sweetalert.css'
        // 'vendors/nestable.css'
    ], 'public/css/admin-theme.css');

    mix.styles([
        'vendors/pdf.css'
    ], 'public/css/quotes-pdf.css');

    mix.copy([
        'node_modules/materialize-css/dist/js/materialize.js',
        'node_modules/materialize-css/js/plugins/materialize2.js',
        'node_modules/materialize-css/node_modules/jquery/dist/jquery.min.js',
        'node_modules/materialize-css/js/plugins/jquery-1.11.2.min.js',

        <!--scrollbar-->
        'node_modules/materialize-css/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        <!-- chartjs -->
        'node_modules/materialize-css/js/plugins/chartist-js/chartist.min.js',
        'node_modules/materialize-css/js/plugins/formatter/jquery.formatter.min.js',
        <!-- chartjs -->
        'node_modules/materialize-css/js/plugins/jquery-validation/jquery.validate.min.js',
        'node_modules/materialize-css/js/plugins/jquery-validation/additional-methods.min.js',
        <!-- chartjs -->
        'node_modules/materialize-css/js/plugins/chartjs/chart.min.js',
        'node_modules/materialize-css/js/plugins/chartjs/chart-script.js',
        <!-- dropify -->
        'node_modules/materialize-css/js/plugins/dropify/js/dropify.min.js',
        <!-- sparkline -->
        'node_modules/materialize-css/js/plugins/sparkline/jquery.sparkline.min.js',
        'node_modules/materialize-css/js/plugins/sparkline/sparkline-script.js',

        <!--jvectormap-->
        'node_modules/materialize-css/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'node_modules/materialize-css/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'node_modules/materialize-css/js/plugins/jvectormap/vectormap-script.js',
        'node_modules/materialize-css/js/plugins/data-tables/data-tables-script.js',
        'node_modules/materialize-css/js/plugins/data-tables/js/jquery.dataTables.min.js',

        <!--google map-->
        'node_modules/materialize-css/js/plugins/google-map/google-map-script.js',
        'node_modules/sweetalert/dist/sweetalert.min.js',
    ], 'resources/assets/js/vendors');

    mix.scripts([
        'vendors/jquery.min.js',
        'vendors/materialize.js',
        'vendors/owl.carousel.js',
        'vendors/video.js',
        'vendors/jquery.sticky-kit.min.js',
        'vendors/masonry.pkgd.js',
        'vendors/data-tables-script.js',
        'vendors/jquery.dataTables.min.js'

    ], 'public/js/app.js');

    mix.scripts([
        'vendors/jquery.min.js',
        'vendors/jquery-ui.js',
        'vendors/materialize2.js',
        <!--scrollbar-->
        'vendors/perfect-scrollbar.min.js',
        'vendors/jquery.sticky-kit.min.js',
        <!-- chartjs -->
        // 'vendors/chartist.min.js',
        // 'vendors/jquery.formatter.min.js',
        // <!-- chartjs -->

        // 'vendors/chart.min.js',
        // 'vendors/chart-script.js',
        'vendors/dropify.min.js',
        'vendors/jquery.validate.min.js',
        'vendors/additional-methods.min.js',

        // <!-- sparkline -->
        'vendors/jquery.sparkline.min.js',
        'vendors/sparkline-script.js',
        'vendors/data-tables-script.js',
        'vendors/jquery.dataTables.min.js',
        <!--jvectormap-->
        // 'vendors/jquery-jvectormap-1.2.2.min.js',
        // 'vendors/jquery-jvectormap-world-mill-en.js',
        // 'vendors/vectormap-script.js',
        <!--google map-->
        // 'vendors/google-map-script.js',
        // 'resources/assets/js/vendors/jquery.nestable.js',
       'vendors/funciones.js',
        'vendors/sweetalert.min.js',
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
