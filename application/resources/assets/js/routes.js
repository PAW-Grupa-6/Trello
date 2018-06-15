import VueRouter from 'vue-router';
import Board from './components/Board.vue';

let routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/board',
        component: Board
    }
];

export default new VueRouter({
    routes
});