var elixir = require('laravel-elixir');

elixir(function(mix) {

mix.styles(['../../../node_modules/bootstrap/dist/css/bootstrap.min.css'], 'public/css/styles.css');
mix.browserify('main.js');
});
