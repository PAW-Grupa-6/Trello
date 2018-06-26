/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

import VueRouter from 'vue-router';
import VuePaginate from "vuejs-paginate";

import Api from './api';
import Auth from './auth.js';

window.Vue = require('vue');
Vue.use(VueRouter);
window.api = new Api();
window.auth = new Auth();

import Layout from "./components/Layout";
import Login from "./components/Login";
import Register from "./components/Register";
import Boards from "./components/Board";
import BoardCreate from './components/BoardCreate';
import Tasks from './components/Tasks';
import TaskCreate from './components/TaskCreate';

import router from './routes';



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
Vue.component('tasks', Tasks);
Vue.component('task-create', TaskCreate);

const app = new Vue({
    el: '#app',
    router,
});
