/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VuePaginate from "vuejs-paginate";

import Auth from './auth.js';

window.auth = new Auth();

import Layout from "./components/Layout";
import Login from "./components/Login";
import Register from "./components/Register";
import Boards from "./components/Board";
import BoardCreate from './components/BoardCreate';

import router from './routes';

Vue.use(VueRouter);

window.Event = new Vue;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-layout', Layout);
Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('board', Boards);
Vue.component('paginate', VuePaginate);
Vue.component('board-create', BoardCreate);

const app = new Vue({
    el: '#app',
    router
});
