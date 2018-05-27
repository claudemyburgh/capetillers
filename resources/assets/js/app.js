
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

window.Flickity = require('flickity');

import TweenMax from 'gsap'
import ScrollMagic from 'scrollmagic'
require('jquery-equal-height/js/jquery-equal-height.js');
require('animation.gsap');
// require('debug.addIndicators');
// require('ScrollToPlugin');

require('jquery-slimscroll')

const luna =  require('luna-sass/Framework/js/luna.js');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });



(function($, window, document){

	'use strict';


	// $('.theme_selector').click(function(e){
	// 	axios.post("api/theme").then(function(){
	// 		console.log('default');
	// 	});
	// });


	$(document).Luna();


	var body = $("html, body");
	body.stop().animate({scrollTop:0}, 500, 'swing');

	if($('.notify__big').length){
		TweenMax.to('.notify__big', 0.2, {y: "-100px", ease:Power0.easeOut, delay: 2})
	}


	//Main Controller
	var controller = new ScrollMagic.Controller();

	if ($('.hero').length){
		var heroTween = new TimelineMax();

		heroTween
			.from('.hero__image', 1, {y: "-40%", ease:Power0.easeNone})


		var sceneHero = new ScrollMagic.Scene({
			triggerElement: ".hero", 
			duration: "200%", 
			triggerHook: 1
		})
		.setTween(heroTween)
		// .addIndicators() 
		.addTo(controller);

	}// hero scroller

	if ($('.menu').length){
		var stikyMenu = new ScrollMagic.Scene({
			triggerElement: '.menu',
			triggerHook: 0

		})
		// .addIndicators()
		.setPin('.menu')
		.addTo(controller);
	}// sticky menu


	if ($('.block_animation_trigger').length){

		$('.block_animation_trigger').each(function(e){

			var blockScroll = new ScrollMagic.Scene({
				triggerElement: this,
				triggerHook: 0.8,
				duration: "100%"
			})
			// .addIndicators()
			.setTween(TweenMax.staggerFrom('.block_animation_elements', 0.3, {y: 50, opacity: 0.5, scale: 0.75}, 0.1))
			.addTo(controller);
			
		});


	}


	if ($('#parallax').length){

		var parallaxTimeline = new ScrollMagic.Scene({
			triggerElement: '#parallax',
			triggerHook: 1,
			duration: "300%"
		})
		.setTween(TweenMax.to('.parallax__image', 1, {y: "30%", ease:Power0.none}))
		.addTo(controller);
	}

	$(window).on('load', function(event) {
	    $('.jQueryEqualHeight').jQueryEqualHeight('.panel .panel__body');
	});

	$(window).on('resize', function(event) {
	    $('.jQueryEqualHeight').jQueryEqualHeight('.panel .panel__body');
	});

	let stikyImages = () =>{

		if (window.matchMedia('(min-width: 799px)').matches) {

			if ($('.product__photo__list').length) {
			
				var StickMe = new ScrollMagic.Scene({
						triggerElement: ".stickme__trigger",
						triggerHook: 0.2,
						duration: "100%"
					})
					.setPin('.stickme', {pushFollowers: false})
					// .addIndicators()
					.addTo(controller);
			}
		} // media query

		if ($('.product__photo__list').length) {

			$('.product__photo__list').flickity({
				autoPlay: 3000,
				pageDots: true,
				prevNextButtons: true,
				cellAlign: 'left',
				contain: true,
				imagesLoaded: true
			});
		};

	}

	stikyImages()

	window.addEventListener('resize', () => {
		
		stikyImages();

	}, false)




	$(document).ready(function(){
		$('.the__loader').hide();
		TweenMax.to('.primary__overlay', 0.5, {x: "-100%"})
		TweenMax.to('.secondary__overlay', 0.5, {x: "100%"})
	});


})(jQuery, window, document);
