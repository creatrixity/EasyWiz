<template>
    <li v-bind:class="indicatorClass" @click="skipToStep">
        <div class="step-indicator__step"> <b>{{ step.id}}</b> </div>
        <div class="step-indicator__caption hidden-xs hidden-sm">
            {{ step.title }}
        </div>
    </li>
</template>

<script>
    export default {
        props: ['step', 'currentstep', 'steps'],

        computed: {
            indicatorClass: function () {
                return {
                    'active': (this.step.id == this.currentstep),
                    'complete': (this.currentstep > this.step.id),
                    'last': (this.step.id === this.steps.length)
                }
            }
        },

        methods: {
            skipToStep: function () {
                this.$emit('step-change', this.step.id);
            }
        }

    }
</script>
