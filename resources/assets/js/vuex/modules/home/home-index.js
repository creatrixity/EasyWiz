import { mutations } from './mutations';

import * as actions from './actions';
import * as getters from './getters';

const state = {
    currentstep: 1,

    isTeamModalOpen: false,
    isTeamCreateModalOpen: false,
    isCompetitionCreateModalOpen: false,

    loading: false,

    hasFetchedLeaderboards: false,
    hasFetchedTeams: false,
    hasFetchedCompetitions: false,

    steps: [
        {
            id: 1,
            label: 'Personal',
            title: 'Add Personal Information',
            icon_class: 'fa fa-user'
        },
        {
            id: 2,
            label: 'Team',
            title: 'Add Team',
            icon_class: 'fa fa-calendar'
        },
        {
            id: 3,
            label: 'Complete',
            title: 'Complete Wizard',
            icon_class: 'fa fa-space-shuttle'
        }
    ],

    leaderboards: [],

    competitions: [],

    teams: []

}

export default {
    actions,
    getters,
    state,
    mutations,
};
