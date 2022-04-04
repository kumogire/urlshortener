import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Archive from './pages/Archive.vue';

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
            path: '/archive',
            name: 'archive',
            component: Archive
        },
    ]
});

export default router;
