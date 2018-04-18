import Vue from 'vue';
import VueRouter from 'vue-router';

import { routes } from './config/router-config';

Vue.use(VueRouter);

export default new VueRouter({
    // hashbang: false,
    // history: true,
    linkActiveClass: 'active',
    mode: 'history',
    base: window.Laravel.URI,

    routes,
});
