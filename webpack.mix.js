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

mix.js('resources/js/hiperprecios.js', 'public/js')
    .extract(['alpinejs', 'apexcharts', 'lodash', 'axios', 'jQuery'])
    .postCss('resources/css/hiperprecios.css', 'public/css')
    .sass('resources/sass/theme.scss', 'public/css')
    .sass('resources/sass/theme_print.scss', 'public/css')
    .options({
        fileLoaderDirs: {
            images: 'images',
            fonts: 'fonts'
        },
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
            require('autoprefixer'),
        ]
    })
    .version();
