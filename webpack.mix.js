let mix = require('laravel-mix');
let Path = require('path');
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

mix.webpackConfig({
	resolve: {

		alias: {
			"TweenLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
			"TweenMax": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenMax.js'),
			"TimelineLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TimelineLite.js'),
			"TimelineMax": Path.resolve('node_modules', 'gsap/src/uncompressed/TimelineMax.js'),
			"ScrollToPlugin": Path.resolve('node_modules', 'gsap/src/uncompressed/plugins/ScrollToPlugin.js'),
			"ScrollMagic": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
			"animation.gsap": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
			"debug.addIndicators": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js'),
			"flickity": Path.resolve('node_modules', 'flickity/dist/flickity.pkgd.js')
		}
	}
	})
	.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/admin.js', 'public/js')
   .sass('resources/assets/sass/style.sass', 'public/css')
   .sass('resources/assets/sass/admin.sass', 'public/css');
