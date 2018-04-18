
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

import { sync } from 'vuex-router-sync';

import App from './components/App.vue';

import Vuex from 'vuex';

import store from './vuex/store.js';

import router from './routes.js';

require('./directives/index');

sync(store, router);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

 new Vue({
  el: '#app',
  router,
  store,
  template: '<App/>',
  components: { App }
})

 // const app = new Vue({
 //     router,
 //     store,
 //     render: h => h(App)
 // }).$mount('#app');
