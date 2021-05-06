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

mix.copyDirectory('resources/backend', 'public/backend');
mix.copyDirectory('resources/frontend', 'public/frontend');
/*
mix.js('resources/backend/js/app.js', 'public/js')
    .js('resources/assets/js/menu.js', 'public/js')
    .js('resources/assets/js/cart.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');*/
mix.js('resources/js/app.js', 'public/backend/js').vue();
mix.js('resources/js/front.js', 'public/frontend/js');
