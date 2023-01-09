require("./bootstrap");

window.Vue = require("vue").default;

import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes/index";
import VueSweetalert2 from "vue-sweetalert2";
import VueCookies from 'vue-cookies';
import Buefy from 'buefy';

Vue.use(Buefy, {
    defaultIconComponent: 'vue-fontawesome',
});

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas, far, fab)

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.use(VueSweetalert2);

Vue.use(VueRouter);

const router = new VueRouter(routes);

function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index];

    if(!subsequentMiddleware) {
        return context.next;
    }

    return (...parameters) => {
        context.next(...parameters);
        const nextMiddleware = nextFactory(context, middleware, index + 1);
        subsequentMiddleware({...context, next: nextMiddleware});
    }
}

router.beforeEach((to, from, next) => {
    const getMiddleware = to.meta.middleware;
    if (getMiddleware) {
        const middleware = Array.isArray(getMiddleware) ? getMiddleware : [getMiddleware];
        const context = {from, next, router, to};
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({...context, next: nextMiddleware})
    }

    return next();
});

const app = new Vue({
    el: "#app",
    router
});
