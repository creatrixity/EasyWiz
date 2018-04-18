import Vue from 'vue';
import Vuex from 'vuex';

import home from '../vuex/modules/home/home-index';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        home
    },

    strict: true
});
