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

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/vendor/pace.js',
        'resources/js/vendor/perfect-scrollbar.js',
        'resources/js/vendor/coreui.js',
        'resources/js/vendor/Chart.js',
        'resources/js/vendor/charts.js',
        'resources/js/vendor/custom-tooltips.js',
        'resources/js/vendor/main.js',
        'resources/js/vendor/colors.js',
        'resources/js/vendor/poppvers.js',
        'resources/js/vendor/tooltips.js',
        'resources/js/vendor/widgets.js',
        // 'resources/js/vendor/popper.js',
    ], 'public/js/all.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/vendor/coreui-icons.css',
        'resources/css/vendor/flag-icons.css',
        'resources/css/vendor/font-awesome.css',
        'resources/css/vendor/simple-line-icons.css',
        'resources/css/vendor/pace.css',
        'resources/css/vendor/style.css',
    ], 'public/css/all.css')
    .copyDirectory('resources/img', 'public/img')
    .copyDirectory('resources/fonts', 'public/fonts');
