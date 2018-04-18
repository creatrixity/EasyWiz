import { normalize, schema } from 'normalizr';

import api from '../../../api/index';

import { competitor, region } from '../../schema/home';

export const setLoader = ({commit}, loading) => {
    commit('SET_LOADER', {
        loading: loading
    });
};

export const setCompetitionsFetchedStatus = ({commit}, status) => {
    commit('SET_COMPETITIONS_FETCHED_STATUS', {
        status: status
    });
};

export const setTeamsFetchedStatus = ({commit}, status) => {
    commit('SET_TEAMS_FETCHED_STATUS', {
        status: status
    });
};

export const setTeamID = ({commit}, teamID) => {
    commit('SET_TEAM_ID', {
        teamID
    });
};


export const setLeaderboardsFetchedStatus = ({commit}, status) => {
    commit('SET_LEADERBOARDS_FETCHED_STATUS', {
        status: status
    });
};

export const setTeamModalStatus = ({commit}, status) => {
    commit('SET_TEAM_MODAL_STATUS', {
        status: status
    });
};

export const setTeamCreateModalStatus = ({commit}, status) => {
    commit('SET_TEAM_CREATE_MODAL_STATUS', {
        status: status
    });
};

export const setCompetitionModalStatus = ({commit}, status) => {
    commit('SET_COMPETITION_MODAL_STATUS', {
        status: status
    });
};

export const setCompetitionCreateModalStatus = ({commit}, status) => {
    commit('SET_COMPETITION_CREATE_MODAL_STATUS', {
        status: status
    });
};

export const setStep = ({commit}, step) => {
    commit('SET_STEP', {
        step: step
    });
};

export const getAllTeams = ({ commit }, callback) => {

	api.fetchData('/api/v1/teams', teams => {
		if (teams) {
			commit('GET_ALL_TEAMS', teams)

            callback(teams);
		}
	}, function () {
        alert('Failed to fetch teams. Try again');
    })

}

export const getAllCompetitions = ({ commit }, callback) => {
	api.fetchData('/api/v1/competitions', competitions => {

		if (events) {
			commit('GET_ALL_COMPETITIONS', competitions)

            callback(competitions);
		}

	}, function () {
        alert('Failed to fetch competitions. Try again');
    })
}

export const getAllLeaderboards = ({ commit }, callback) => {

	api.fetchData('/api/v1/leaderboards', leaderboards => {
		if (leaderboards) {
			commit('GET_ALL_COMPETITIONS', leaderboards);

            callback(leaderboards);
		}
	}, function () {
        alert('Failed to fetch leaderboards. Try again');
    });

}

export const persistCompetition = ({ commit }, payload) => {
	api.sendData('/api/v1/competitions', payload.data, (res) => {

		if (res) {
            payload.callback(res.data);
		}

	}, function () {
        alert('Failed to create competition. Try again');
    })
}

export const persistTeam = ({ commit }, payload) => {
	api.sendData('/api/v1/teams', payload.data, (res) => {

		if (res) {
            payload.callback(res.data);
		}

	}, function () {
        alert('Failed to create team. Try again');
    })
}


export const addCompetitionToStore = ({ commit }, payload) => {
    commit('ADD_COMPETITION', payload);
}

export const addTeamToStore = ({ commit }, payload) => {
    commit('ADD_TEAM', payload);
}
