<template>
  <div>
    <transition name="fade" mode="out-in">
        <router-view></router-view>
    </transition>
  </div>
</template>

<script>
    import Vue from 'vue';

    export default {
      name: 'app',
    };
</script>

<style>
    .u-mb-md
    {
        margin-bottom: 30px;
    }
</style>
