import VueRouter from 'vue-router';
import Board from './components/Board.vue';

let routes = [
    {
        path: '/board',
        component: Board
    }
];

export default new VueRouter({
    routes
});