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
    .js('resources/assets/js/sb-admin-2.min.js', 'public/js')
    .js('resources/assets/js/sb-admin-2.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/assets/scss/sb-admin-2.scss', 'public/css/admin.css')
    .sass('resources/assets/scss/custom.scss', 'public/css')
    .sourceMaps();
