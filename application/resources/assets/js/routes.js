import VueRouter from 'vue-router';
import Login from "./components/Login";
import Register from "./components/Register";
import Home from './components/Home';

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
    }
];

const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
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
