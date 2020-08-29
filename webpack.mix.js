const mix = require('laravel-mix');

require('mix-tailwindcss');

mix.js('resources/js/app.js', 'public/js')
	.autoload({
		jquery: ['$', 'window.jQuery', 'jQuery']
	})
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind();
