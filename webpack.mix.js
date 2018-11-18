let mix = require('laravel-mix');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
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
          'resources/js/admin/components',
      ),
      '@reducers': path.resolve(
          __dirname,
          'resources/js/admin/store/reducers'
      ),
      '@styles': path.resolve(
          __dirname,
          'public/css'
      ),
      '@assets': path.resolve(
          __dirname,
          'resources/js/admin/assets'
      )
    },
  },
}).react('resources/js/admin/index.js', 'public/js/admin')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync('myblog.loc');

