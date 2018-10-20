let mix = require('laravel-mix');

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

mix.js('resources/assets/js/jquery.js', 'public/js')
    .js('resources/assets/js/dashboard.js', 'public/js')
    .js('resources/assets/js/misc.js', 'public/js')
    .js('resources/assets/js/off-canvas.js', 'public/js')
    .js('resources/assets/js/addons.js', 'public/js')
    .js('resources/assets/js/bundle.base.js', 'public/js')
    .sass('resources/assets/scss/style.scss', 'public/css');