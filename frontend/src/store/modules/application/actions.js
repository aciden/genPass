import RequestService from '@/service/RequestService';
import * as types from './types';

export default {
    getApplicationList ({ commit }, conditionData) {
        RequestService.request(
            '/api-internal/applications',
            conditionData,
            response => commit(types.SET_APPLICATION_LIST, response)
        );
    },
    createApplication ({ commit }, application) {

        return new Promise((resolve, reject) => {
            RequestService.put(
                '/api-internal/create-application',
                application,
                response => {
                    commit(types.CREATE_APPLICATION, response);
                    resolve(response)
                }
            );
        });
    },
    searchApplication ({ commit }, searchString) {
        commit(types.SEARCH_APPLICATION, searchString)
    },
}