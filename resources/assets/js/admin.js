
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.component('data-component', require('./components/DataTable.vue'));
Vue.component('run-task', require('./components/RunTask.vue'));
// Vue.component('facebook-app', require('./components/FacebookApp.vue'));
Vue.component('sidebar-button', require('./components/SidebarButton.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 window.Dropzone = require('dropzone');
 Dropzone.autoDiscover = false;

require('slimscroll')





const luna = require('luna-sass/Framework/js/luna.js');


const app = new Vue({
    el: '#app'
});




(function($, window, document, undefined){

	'use strict';

	$(document).Luna();





})(jQuery, window, document);
