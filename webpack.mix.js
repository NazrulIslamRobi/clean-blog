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
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'resources/css/clean-blog.css',
    'node_modules/toastr/build/toastr.css',
   
   ], 'public/css/app.css').version();

   mix.js([
    'resources/js/jquery.slim.js',
    'resources/js/app.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'resources/js/clean-blog.js',
    'node_modules/toastr/toastr.js',
    'resources/js/sweetalert.min.js',
    
    
    ], 'public/js/app.js').version();
    








