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

    mix.copy('resources/assets/css/ie8.css', 'public/css/ie8.css');
    mix.copy('resources/assets/css/ie9.css', 'public/css/ie9.css');
    mix.copy('resources/assets/css/main.css', 'public/css/main.css');
    mix.copy('resources/assets/css/vendor', 'public/css/vendor');
    mix.copy('resources/assets/js/vendor', 'public/js/vendor');
    mix.copy('resources/assets/fonts', 'public/fonts');

    mix.scripts([
        'util.js',
        'main.js'
    ]);
    exec('php artisan Site:cacheImages');
});
