const elixir = require('laravel-elixir');

const BrowserSync = require('laravel-elixir-browsersync');

const projectConfig = {
    serverAddress: '127.0.0.1:8000',
    sassEntry: 'easywiz.scss',
    jsEntry: 'app.js'
};

require('laravel-elixir-vue-2');

elixir.config.assetsPath = 'resources/assets';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.webpack(projectConfig.jsEntry)
   .browserSync({
       proxy: projectConfig.serverAddress,
   });
});
