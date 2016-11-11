var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Asset Management
 |--------------------------------------------------------------------------
 */

elixir.config.publicPath = '../../../';
elixir.config.assetsPath = './assets/';
elixir.config.css.autoprefix.options = { browsers: ['> 0.25%'] };

elixir(function (mix) {

  mix.sass(elixir.config.assetsPath + 'sass/style.scss', './');

  mix.scripts([
    elixir.config.assetsPath + 'js/skip-link-focus-fix.js',
    elixir.config.assetsPath + 'js/app.js'
  ]);

  mix.browserSync({
    proxy: 'rhapsody.loc',
    files: [
      './**/*.php',
      elixir.config.assetsPath + 'js/**/*.js',
      './**/*.css',
    ],
    port: 4000
  });
});
