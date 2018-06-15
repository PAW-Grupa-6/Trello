import VueRouter from 'vue-router';
import Login from "./components/Login";
import Home from './components/Home';

let routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
];

export default new VueRouter({
    routes
});