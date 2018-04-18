<template>
    <section>
        <team-modal :open="getTeamModalStatus" @teamSelected="addTeam"></team-modal>

        <team-create-modal :open="getTeamCreateModalStatus" @teamSaved="processTeam"></team-create-modal>

        <competition-modal :open="getCompetitionModalStatus" @competitionSaved="setCompetitionID"></competition-modal>

        <div class="container">
            <div class="row">
                <section class="clearfix">
                    <div class="col-md-6 col-md-offset-3 form-container u-mb-lg" style="margin-bottom: 30px;">
                        <form class="panel panel-default" method="post" @submit.prevent="nextStep">
                            <section class="panel-heading">
                                <h3 class="u-mb-md text-center">
                                    Add a Team
                                </h3>
                            </section>

                            <section class="panel-body">

                                <section class="text-center">
                                    <h4 class="text-bold text-uppercase u-mb-sm">Teams Selection </h4>
                                    <a href="#" @click.prevent="triggerTeamModal" class="btn btn-primary u-mb-md">
                                        <i class="fa fa-plus"></i> &nbsp; Choose a team
                                    </a>

                                    <a href="#" @click.prevent="triggerTeamCreateModal" class="btn btn-default u-mb-md">
                                        Create a new team
                                    </a>

                                    <section class="tw-teams" v-if="teams">
                                        <h4 class="text-bold text-uppercase u-mb-sm clearfix">Teams</h4>

                                        <section class="row">
                                            <div v-for="team in teams" style="margin-bottom: 15px;" class="col-lg-6">

                                                <section class="tw-team text-center">
                                                    <img :src="team.artwork" alt="" class="tw-team__artwork u-mb-sm">
                                                    <p class="tw-team__title text-center clearfix">{{ team.alias }}</p>
                                                </section>

                                                <a @click.prevent="removeTeam(team)" href="#" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Remove {{ team.alias }}
                                                </a>
                                            </div>
                                        </section>

                                    </section>

                                </section>

                                <div class="form-group u-mb-md">
                                    <section>
                                        <label class="" for="">
                                            Competitions
                                        </label>
                                        <a href="#" @click.prevent="triggerCompetitionModal" class="btn btn-link pull-right">Create a new competition <b class="caret"></b></a>
                                    </section>

                                    <select v-validate data-vv-rules="required" v-model="competition_id" name="competition_id" class="form-control clearfix">
                                        <option v-for="competition in getCompetitions" :value="competition.id">{{ competition.name }}</option>
                                    </select>
                                    <p class="text-warning" v-if="errors.has('competition_id')">{{ errors.first('competition_id') }}</p>
                                </div>

                                <div class="form-group clearfix">
                                    <button type="submit" class="btn btn-lg btn-block btn-info pull-right">
                                        Next Step (2/3)
                                    </button>
                                </div>
                            </section>
                        </form>

                    </div>
                </section>

            </div>
        </div>

    </section>
</template>

<script>
    import Vue from 'vue';

    import VeeValidate from 'vee-validate';

    Vue.use(VeeValidate, {
        events: 'input|blur'
    });

    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    Vue.component('team-modal', require('./dialog/team-modal.vue'));
    Vue.component('team-create-modal', require('./dialog/team-create-modal.vue'));
    Vue.component('competition-modal', require('./dialog/competition-modal.vue'));

    export default {
        props: [],

        data: function () {
            return {
                team: {
                    'id': '',
                },

                'competitors': []
            }

        },

        mounted () {
            var self = this;

            this.$parent.setStep(2);

            if (!this.getCompetitions.length) {
                self.setLoader(true);

                this.getAllCompetitions(function () {
                    self.setLoader(false)
                });
            }

        },

        computed: {
            ...mapGetters([
                'getCompetitions',
                'getTeams',
                'getTeamModalStatus',
                'getTeamCreateModalStatus',
                'getCompetitionModalStatus',
                'getCurrentStep'
            ]),

            competitionModalOpen () { return this.isCompetitionModalOpen}
        },

        methods: {
            ...mapActions ([
                'setLoader',
                'setCompetitionModalStatus',
                'setTeamModalStatus',
                'setTeamCreateModalStatus',
                'getAllCompetitions',
                'getAllTeams',
                'setTeamID'
            ]),

            triggerCompetitionModal () {
                this.setCompetitionModalStatus(true);
            },

            triggerTeamModal () {
                this.setTeamModalStatus(true);
            },

            triggerTeamCreateModal () {
                this.setTeamCreateModalStatus(true);
            },

            processTeam (team) {
                var self = this;

                this.addTeam(team);

                self.setLoader(true);
            },

            addTeam (teamID) {
                var matchFound = false,
                    self = this;

                this.teams.forEach(function (item) {
                    if (item.id == teamID) {
                        matchFound = true;
                    }
                });

                if (!matchFound) {
                    this.teams.push(this.getTeams[teamID]);
                }

            },

            removeTeam (team) {
                this.teams = this.teams.filter(function(item) {
                    return item.id !== team.id
                });
            },

            setCompetitionID (data) {
                this.competition_id = data.id;
            },

        }
    }
</script>
