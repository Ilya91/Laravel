/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

import Prop from './components/PropComponent.vue';
Vue.component('prop-component', Prop);

import Ajax from './components/AjaxComponent.vue';
Vue.component('ajax-component', Ajax);

import ChartLine from './components/ChartLineComponent.vue';
Vue.component('chartline-component', ChartLine);

import Pie from './components/PieComponent.vue';
Vue.component('pie-component', Pie);

import Random from './components/ChartRandomComponent.vue';
Vue.component('random-component', Random);

import Socket from './components/SocketComponent.vue';
Vue.component('socket-component', Socket);

const app = new Vue({
    el: '#app'
});
