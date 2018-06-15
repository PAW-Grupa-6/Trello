/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VuePaginate from "vuejs-paginate";

import Layout from "./components/Layout";
import Login from "./components/Login";
import Boards from "./components/Board";
import BoardCreate from './components/BoardCreate';

import router from './routes';

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-layout', Layout);
Vue.component('login', Login);
Vue.component('board', Boards);
Vue.component('paginate', VuePaginate);
Vue.component('board-create', BoardCreate);

console.log(process.env);

const app = new Vue({
    el: '#app',
    router
});
