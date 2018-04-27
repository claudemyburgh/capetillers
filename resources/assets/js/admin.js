
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.component('data-component', require('./components/DataTable.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 window.Dropzone = require('dropzone');
 Dropzone.autoDiscover = false;

require('slimscroll')



const luna = require('luna-sass/Framework/js/luna.js');

Vue.component('sidebar-button', require('./components/SidebarButton.vue'));

const app = new Vue({
    el: '#app'
});




(function($, window, document, undefined){

	'use strict';

	$(document).Luna();


	var editor = CodeMirror(document.getElementById('editor'))

	// $('#menu__trigger').click(function(){

	// 	axios.post('admin/api/sidebarsession').then(function(){
	// 		console.log('clicked');
	// 	});
		
	// });




})(jQuery, window, document);
