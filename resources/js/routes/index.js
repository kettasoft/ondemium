import Home from "../pages/Home.vue";

import auth from "./middlewares/Auth";
import guest from "./middlewares/Guest";

export default {
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/login',
            name: 'Login',
            component: () => import('../pages/auth/Login.vue'),
            meta: {
                title: 'Login',
                middleware: guest
            }
        },
        {
            path: '/signup',
            name: 'signup',
            component: () => import('../pages/auth/Signup.vue'),
            meta: {
                title: 'Signup to Ondemium',
                middleware: guest
            }
        }
    ]
};
