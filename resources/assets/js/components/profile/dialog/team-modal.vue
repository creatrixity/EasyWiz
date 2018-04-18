<template>
    <section>
        <form method="post">
            <div class="modal fade" :class="{ in: open, visible: open }" v-show="open">
                <section class="modal-dialog">
                    <div class="modal-content">
                        <section class="modal-header">
                            <h3 class="text-uppercase text-center">
                                Choose a Team
                                <button @click.prevent="closeModal" type="button" class="close btn btn-default" data-dismiss="modal">&times;</button>
                            </h3>
                        </section>

                        <section class="modal-body">
                            <section class="u-mb-sm">

                                <section class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i> &nbsp; Find a team</span>
                                    <input id="search" class="form-control" v-focus autofocus @focus="switchSearchMode" @keyup="this._logQuery" type="text">
                                </section>

                            </section>

                            <section class="tw-teams clearfix">
                                <h2 class="text-center u-mb-xs">All Teams</h2>
                                <div class="container-fluid">

                                    <section class="row" v-if="isSearching">
                                        <h3>Search Results for: <b>{{ this.query }}</b> </h3>
                                        <div v-for="team in filterTeams" style="margin-bottom: 15px;" class="col-sm-4 col-xs-6">
                                            <section class="tw-team text-center" @click.prevent="selectTeam(team)">
                                                <img :src="team.artwork" alt="" class="tw-team__artwork u-mb-sm">
                                                <p class="tw-team__title text-center clearfix">{{ team.alias }}</p>
                                            </section>
                                        </div>
                                    </section>
                                </div>

                            </section>


                        </section>

                    </div>
                </section>
            </div>
            <div class="modal-backdrop" v-show="open"></div>
        </form>

    </section>
</template>

<script>
    import Vue from 'vue';

    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    // Register a global custom directive called v-focus
    Vue.directive('focus', {
        // When the bound element is inserted into the DOM...
        inserted: function (el) {
            // Focus the element
            el.focus();
        }
    })

    export default {

        data: () => {
            return {
                query: '',
                isSearching: false
            }
        },

        props: {
            open: {
                type: Boolean,
                default() {
                    return true;
                },
            },
        },

        watch: {
            open: () => {
                document.getElementById('search').focus();
            },

            query: () => {
                this.filterTeams;
            }
        },

        computed: {
            ...mapGetters([
                'getCompetitionModalStatus',
                'getTeams'
            ]),

            filterTeams () {
                var results = [];

                if (this.query.length) {

                    for (var team in this.getTeams) {

                        if (this.getTeams[team].name.toLowerCase().indexOf(this.query.toLowerCase()) > -1) {
                            results.push(this.getTeams[team]);
                        }

                    }

                    return results;
                }

                return this.getTeams;
            },

        },

        methods: {
            ...mapActions ([
                'setLoader',
                'setTeamModalStatus',
                'setRegionModalStatus',
                'persistCompetition',
                'addCompetitionToStore',
            ]),

            _logQuery (e) {
                this.query = e.target.value;
            },

            _getTeams () {
                return this.getTeams;
            },

            switchSearchMode (e) {
                this.isSearching = true;
            },

            closeModal () {
                this.setLoader(false);
                this.setTeamModalStatus(false);
            },

            selectTeam (teamID) {
                this.$emit('teamSelected', teamID);
                this.closeModal();
            },

        }
    }
</script>

<style scoped>
    .modal-backdrop
    {
        background: rgba(0, 0, 0, 0.8);
    }

    .visible
    {
        display: block;
    }
</style>
