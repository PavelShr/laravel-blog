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
       resolve: {
           alias: {
               '@components': path.resolve(
                   __dirname,
                   "resources/assets/js/components",
               ),
           }
       }
   })
   .react('resources/js/index.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync('myblog.loc');
