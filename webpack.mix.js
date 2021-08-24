const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

 mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/applogin.js', 'public/js')
    .vue()   
    .styles([
        'resources/css/material-dashboard.css',
        'resources/css/font-awesome.min.css', 
        'resources/css/fonts-googleapis.css',
        'resources/css/cropper.css'
    ],  'public/css/plantillas.css')  
    .scripts([
        'resources/assets/js/bootstrap-material-design.min.js',
        'resources/assets/js/material-dashboard.js',
        'resources/assetsmain/js/plugins/sweetalert2.js',
        'resources/assets/js/main.js'
    ], 'public/js/login.js')
    .scripts([
        'resources/assets/js/lib/config.js',
        'resources/assets/js/lib/esl.js',
        'resources/assets/js/lib/testHelper.js'
    ], 'public/js/chartsinput.js')
    .scripts([
        'resources/assetsmain/js/core/jquery.min.js',
        'resources/assetsmain/js/core/popper.min.js',
        'resources/assetsmain/js/core/bootstrap-material-design.min.js',
        'resources/assetsmain/js/plugins/perfect-scrollbar.jquery.min.js',
        'resources/assetsmain/js/plugins/moment.min.js', 
        'resources/assetsmain/js/plugins/sweetalert2.js',
        'resources/assetsmain/js/plugins/jquery.validate.min.js',
        'resources/assetsmain/js/plugins/jquery.bootstrap-wizard.js',
        'resources/assetsmain/js/plugins/bootstrap-selectpicker.js',
        'resources/assetsmain/js/plugins/bootstrap-datetimepicker.min.js',
        'resources/assetsmain/js/plugins/jquery.dataTables.min.js',
        'resources/assetsmain/js/plugins/bootstrap-tagsinput.js',
        'resources/assetsmain/js/plugins/jasny-bootstrap.min.js',
        'resources/assetsmain/js/plugins/fullcalendar.min.js',
        'resources/assetsmain/js/plugins/jquery-jvectormap.js',
        'resources/assetsmain/js/plugins/nouislider.min.js',
        'resources/assetsmain/js/plugins/arrive.min.js',
        'resources/assetsmain/js/plugins/chartist.min.js',
        'resources/assetsmain/js/plugins/bootstrap-notify.js',
        'resources/assetsmain/js/plugins/cropper.js',
        'resources/assetsmain/js/plugins/qrious.js',
        'resources/assetsmain/js/material-dashboard.js',
        'resources/assetsmain/js/init.js'
    ], 'public/js/dashboard.js');
        