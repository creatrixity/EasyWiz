<template>
    <div>
      <section class="w-top-bar u-mb-lg">

        <section class="container">
          <div class="row">
            <section class="col-md-12">
                <h1 class="w-top-bar__title text-center">Complete Your Profile</h1>
                <p class="lead w-top-bar__subtitle text-center">Step {{ getCurrentStep }} of {{ getSteps.length }} &mdash; {{ getSteps[getCurrentStep - 1].label }} </p>
             </section>
          </div>

          <step-navigation :steps="getSteps" :currentstep="getCurrentStep"></step-navigation>

        </section>

      </section>

      <router-view></router-view>

      <loader :loading="getLoader"></loader>
    </div>
</template>

<script>
  import Vue from 'vue';

  import { mapGetters } from 'vuex';

  import store from '../vuex/store.js';
  import router from '../routes.js';
  import config from '../config/app-config.js';

  Vue.component('step-navigation', require('./wizard/step-navigation.vue'));
  Vue.component('loader', require('./shared/loader.vue'));

  export default {
    methods: {
      setStep (step) {
        return store.dispatch('setStep', step);
      },

      moveToStep (step) {
        return router.push(config.stepData[step - 1]['location']);
      }
    },

    mounted () {},

    computed: {
      ...mapGetters([
        'getLoader',
        'getSteps',
        'getCurrentStep'
      ]),
    }
  };
</script>
