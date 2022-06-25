const mix = require("laravel-mix");
const path = require("path");

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

// mix.js("resources/js/app.js", "public/js")
//     .vue()
//     .postCss("resources/css/app.css", "public/css", [
//         //
//     ])
//     .vue();
mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/main.scss", "public/css")
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve("resources/sass"),
            },
        },
    });

mix.browserSync("127.0.0.1:8000");
