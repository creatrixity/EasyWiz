export const mutations = {
    SET_STEP: function (state, payload) {
        state.currentstep = payload.step;
    },

    SET_TEAM_MODAL_STATUS: function (state, payload) {
        state.isTeamModalOpen = payload.status;
    },

    SET_TEAM_CREATE_MODAL_STATUS: function (state, payload) {
        state.isTeamCreateModalOpen = payload.status;
    },

    SET_COMPETITION_MODAL_STATUS: function (state, payload) {
        state.isCompetitionModalOpen = payload.status;
    },

    SET_COMPETITION_CREATE_MODAL_STATUS: function (state, payload) {
        state.isCompetitionCreateModalOpen = payload.status;
    },

    SET_TEAM_ID: function (state, payload) {
        state.user.team_id = payload.teamID;
    },

    SET_EVENTS_FETCHED_STATUS: function (state, payload) {
        state.hasFetchedCompetitions = payload.status;
    },

    SET_LOADER: function (state, payload) {
        state.loading = payload.loading;
    },

    GET_ALL_COMPETITIONS: (state, payload) => {
        state.competitions = payload.data;
    },

    GET_ALL_TEAMS: (state, payload) => {
        state.teams = payload.data;
    },

    GET_ALL_LEADERBOARDS: (state, payload) => {
        state.leaderboards = payload.data;
    },

    ADD_TEAM: (state, payload) => {
        state.teams.push(payload.data);
    },

    ADD_COMPETITION: (state, payload) => {
        state.competitions.push(payload.data);
    },

}
