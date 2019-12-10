import * as types from './types';

export default {
    [types.SET_APPLICATION_LIST] (state, applicationList) {
        state.applicationList = state.applicationListHold = applicationList;
    },
    [types.CREATE_APPLICATION] (state, application) {
        state.applicationList.push(application);
    },
    [types.SEARCH_APPLICATION] (state, searchString) {
        state.applicationList = state.applicationListHold
            .filter(application => application.name.toLowerCase().includes(searchString.toLowerCase()));
    },
};
