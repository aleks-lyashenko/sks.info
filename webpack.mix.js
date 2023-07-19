const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/front/css/bootstrap.min.css',
    'resources/front/css/main.css'
], 'public/css/styles.css');

mix.js('resources/front/js/bootstrap.bundle.min.js', 'public/js/script.js');

mix.copyDirectory('resources/front/img', 'public/img');