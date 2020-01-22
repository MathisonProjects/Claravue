const mix = require('laravel-mix');

mix.webpackConfig({
	resolve: {
		extensions: ['.js', '.vue', '.json', "*", ".jsx", ".ts", ".tsx"],
		alias: {
      '@' : __dirname + '/resources/js',
      '@shared' : __dirname + '/resources/js/components/shared',
			'@enum' : __dirname + '/resources/js/enum'
		}
	},
	module: {
      rules: [
        {
          test: /\.tsx?$/,
          loader: "ts-loader",
          exclude: /node_modules/
        }
      ]
    }
})
   .js('resources/js/app.js', 'public/js/bundle.js')
   .sass('resources/sass/app.scss', 'public/css');
