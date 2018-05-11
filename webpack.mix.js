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

mix.webpackConfig({
    externals: {
        "jquery": "jQuery",
        "handlebars": "Handlebars",
        "ember": "Ember",
        "emberData": "ember-data",
    }
});

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/style.scss', 'public/css').options({
    processCssUrls: false
});

mix.copyDirectory('resources/assets/js/libs', 'public/js/libs');