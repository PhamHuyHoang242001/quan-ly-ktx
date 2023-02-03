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
//     .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/assets/js', 'public/material/js')
    .css('resources/assets/css/style.css', 'public/material/style.css')
    .copyDirectory('resources/assets/css', 'public/material/css')
    .copyDirectory('resources/assets/demo', 'public/material/demo')
    .copyDirectory('resources/assets/scss', 'public/material/css')
    .copyDirectory('resources/assets/img','public/material/img');
    
