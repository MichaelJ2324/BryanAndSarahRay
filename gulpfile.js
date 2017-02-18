const elixir = require('laravel-elixir');
var exec = require('gulp-exec');
require('laravel-elixir-vue-2');

elixir(function(mix) {
    mix.sass([
        'main.scss'
    ], 'resources/assets/css/main.css');
    mix.sass([
        'ie8.scss'
    ],'resources/assets/css/ie8.css');
    mix.sass([
        'ie9.scss'
    ],'resources/assets/css/ie9.css');

    mix.copy('resources/assets/css', 'public/css');
    mix.copy('resources/assets/js', 'public/js');
    mix.copy('resources/assets/fonts', 'public/fonts');
    mix.copy('resources/assets/images/site', 'public/images');

    mix.scripts([
        'util.js',
        'main.js'
    ]);
    exec('php artisan Site:cacheImages');
});
