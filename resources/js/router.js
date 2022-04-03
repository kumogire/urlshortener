import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import History from './pages/History.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/history',
            name: 'history',
            component: History
        },
    ]
});

export default router;
