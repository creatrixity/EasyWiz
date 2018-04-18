<template>
    <div class="container">
        <div class="row">
            <section class="clearfix">
                <div class="col-md-6 col-md-offset-3 u-mb-lg">

                    <form class="panel panel-primary" method="post" @submit.prevent="updatePersonal">
                        <section class="panel-heading">
                            <h3 class="text-center text-uppercase">
                                Add Personal Info
                            </h3>
                        </section>

                        <section class="panel-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input name="name" class="form-control" v-validate data-vv-rules="required" :autofocus="true" v-model="personal.name" type="text">
                                <p class="text-danger text-right" v-if="errors.has('name')">{{ errors.first('name') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Display name</label>
                                <input name="display_name" class="form-control" v-validate data-vv-rules="required" :autofocus="true" v-model="personal.name" type="text">
                                <p class="text-danger text-right" v-if="errors.has('display_name')">{{ errors.first('display_name') }}</p>
                            </div>

                            <div class="form-group u-mb-sm">
                                <label for="">Birth year</label>
                                <select v-model="personal.birth_year" class="form-control" name="birth_year" id="">
                                    <option v-for="year in 99" :value="(year + 1900)"> {{ (year + 1900) }} </option>
                                </select>
                                <p class="text-danger" v-if="errors.has('birth_year')">{{ errors.first('birth_year') }}</p>
                            </div>

                            <div class="form-group clearfix u-mb-sm">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Next Step (1/3)
                                </button>
                            </div>
                        </section>
                    </form>

                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';

    import VeeValidate from 'vee-validate';

    Vue.use(VeeValidate, {
        events: 'blur'
    });

    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    import store from '../../vuex/store';

    export default {
        props: [],

        data: function () {
            return {
                'personal': {
                    name: '',
                    display_name: '',
                    birth_year: '1999'
                },
            }
        },

        computed: {
          ...mapGetters([
              'getCurrentStep'
          ])
        },

        mounted() {
            this.setStep(1);
        },

        methods: {
            ...mapActions([
                'setLoader',
                'persistPersonal',
                'setStep',
            ]),

            updatePersonal: function () {
                var self = this;

                this.$validator.validateAll().then(result => {
                    if (result) {

                        self.setLoader(true);

                        this.persistPersonal({
                            callback: function (data) {

                                self.setLoader(false);

                                return self.$parent.moveToStep(self.getCurrentStep + 1);
                            },

                            data: this.personal
                        });

                        return;
                    }

                    alert('Correct every field');
                });
            }

        }
    }
</script>
