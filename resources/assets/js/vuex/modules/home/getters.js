
export const getCompetitions = state => state.competitions;

export const getTeams = state => state.teams;


export const getTeamModalStatus = state => state.isTeamModalOpen;

export const getTeamCreateModalStatus = state => state.isTeamCreateModalOpen;

export const getCompetitionModalStatus = state => state.isCompetitionModalOpen;

export const getCompetitionCreateModalStatus = state => state.isCompetitionCreateModalOpen;


export const getCompetitionsFetchedStatus = state => state.hasFetchedCompetitions;

export const getTeamsFetchedStatus = state => state.hasFetchedTeams;

export const getLeaderboardsFetchedStatus = state => state.hasFetchedLeaderboards;


export const getSteps = state => state.steps;

export const getCurrentStep = (state) => state.currentstep;

export const getLoader = (state) => state.loading;
