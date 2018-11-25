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
      '@adminComponents': path.resolve(
          __dirname,
          'resources/js/admin/components',
      ),
      '@adminReducers': path.resolve(
          __dirname,
          'resources/js/admin/store/reducers'
      ),
      '@adminStyles': path.resolve(
          __dirname,
          'public/admin/css'
      ),
      '@adminAssets': path.resolve(
          __dirname,
          'resources/js/admin/assets'
      ),

      '@authComponents': path.resolve(
          __dirname,
          'resources/js/auth/components',
      ),
      '@authReducers': path.resolve(
          __dirname,
          'resources/js/auth/store/reducers'
      ),
      '@authStyles': path.resolve(
          __dirname,
          'public/css/auth'
      ),
      '@authAssets': path.resolve(
          __dirname,
          'resources/js/auth/assets'
      ),
      '@commonComponents': path.resolve(
          __dirname,
          'resources/js/common'
      ),

      '@helpers': path.resolve(
          __dirname,
          'resources/js/helpers'
      ),
    },
  },
}).sass('resources/sass/auth.scss', 'public/css/auth')
  .react('resources/js/admin/index.js', 'public/js/admin')
  .react('resources/js/auth/index.js', 'public/js/auth')
  .browserSync('myblog.loc');

