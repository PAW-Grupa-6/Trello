import VueRouter from 'vue-router';
import Login from "./components/Login";
import Register from "./components/Register";
import Home from './components/Home';
import Board from './components/Board'

let routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: { middlewareAuth: true }
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/boards',
        name: 'board',
        component: Board,
        meta: { middlewareAuth: true }

    }
];

const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    console.log(auth.check());
    if (to.matched.some(record => record.meta.middlewareAuth)) {
        if (!auth.check()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });

            return;
        }
    }

    next();
});

export default router;
