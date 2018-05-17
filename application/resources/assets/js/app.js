
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('login', require('./components/Login'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('board', require('./components/Board'));
Vue.component('paginate', require('vuejs-paginate'));
Vue.component('board-create', require('./components/BoardCreate.vue'));

const app = new Vue({
    el: '#app',
});
