<template lang="html">
    <div v-show="loading" class="loader text-center">
        <section class="loader__bar"></section>
        <section class="loader__indicator">
            <span class="loader__text">Have a coffee. We'll be done in a bit.</span>
        </section>
    </div>
</template>

<script>
export default {
    props: {
        loading: {
            type: Boolean,
            default() {
                return false;
            },
        }
    },

}
</script>

<style>
    @keyframes growHorizontal {
        0% {
            width: 100%;
            background: #eee;
            opacity: 0.9;
        }

        100% {
            width: 0;
            background: #fefefe;
            opacity: 0;
        }
    }

    .loader
    {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: rgba(0, 160, 218, 0.9);
        height: 100%;
        width: 100%;
        color: #fff;
        overflow: hidden;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        top: 0;
    }

    .loader__bar
    {
        position: fixed;
        top: 5px;
        right: 0;
        height: 2px;
        width: 100%;
        opacity: 0;
        background: #fefefe;
        animation-name: 'growHorizontal';
        animation-duration: 5s;
        animation-direction: reverse;
    }

    .loader__icon,
    .loader__text
    {
        display: block;
    }

    .loader__icon
    {
        color: #fcfcfc;
        margin-bottom: 20px;
    }

    .loader__text
    {
        color: #fefefe;
        font-size: 1.5em;
        letter-spacing: 1.3px;
    }

</style>
