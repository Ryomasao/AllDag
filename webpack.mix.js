let mix = require('laravel-mix');
mix.pug = require('laravel-mix-pug');

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


/*
webpack.config.jsを触ってみたけれども、pugファイルを監視対象にする方法が謎。
webpack.config.jsのentrypointにpugファイルを追記すればいけるみたいなものがあったけれども、
npm run devで起動した場合のconfigファイルには、特にpugファイルのエントリーがなくても、コンパイルしてくれてる。
npm run watchでも同じconfigファイルが吐かれている。 
laravel-mix-pugがどうやって、やってんのかよくわからん。

*/

/*
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/sample/sample.scss', 'public/css')
   .webpackConfig({
       module:{
           rules:[{
               test:/\.pug$/,
               loader:'pug-yes'
           }]
       }
   })
mix.pug('resources/assets/pug/sample/app.pug', 'resources/views/sidebar_blade',{})
*/
//mix.sass('resources/assets/sass/sample/sample.scss', 'public/css');


/*
  mix.pug('resources/assets/pug/coupon_admin/toppage.pug', 'resources/views/coupon_admin',{})
     .sass('resources/assets/sass/coupon_admin/toppage.scss', 'public/css')    
     .js('resources/assets/js/toppage.js', 'public/js');
     */
  mix.js('resources/assets/js/form_sample.js', 'public/js');

