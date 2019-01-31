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

mix.js('resources/js/app.js', 'public/js',
'resources/assets/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css',
    'resources/assets/sass/app.scss', 'public/css')
    .styles([
        'public/css/icons.css',
        'public/css/style.css',
    ], 'public/css/all.css')
    .scripts([
        'public/js/theme.js'
    ], 'public/js/all.js')
    .version();
