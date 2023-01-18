// webpack.mix.js

let mix = require('laravel-mix');

mix.js('js/scripts.js', 'js/search.js');

mix.browserSync('https://localhost/wplearn/');
