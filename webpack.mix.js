const mix = require('laravel-mix');

mix.webpackConfig({
	resolve: {
		extensions: ['.js', '.vue', '.json'],
		alias: {
			'@' : __dirname + '/resources/js'
		}
	},
})

mix.js('resources/js/app.js', 'public/js/bundle.js')
mix.sass('resources/sass/app.scss', 'public/css');
mix.sass('resources/sass/app.cyborg.scss' , 'public/css/app.dark.css');
