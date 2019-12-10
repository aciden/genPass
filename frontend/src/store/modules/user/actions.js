import RequestService from '@/service/RequestService';
import * as types from './types';

export default {
    signin ({ commit }, conditionData) {
        return new Promise((resolve, reject) => {
            RequestService.post(
                '/api-internal/signin',
                conditionData,
                response => {
                    commit(types.SIGNIN, response);
                    resolve(response);
                }
            );
        });
    },
    signout ({ commit }, conditionData) {
        RequestService.post(
            '/api-internal/signout',
            conditionData,
            response => commit(types.SIGNOUT)
        );
    },
    checkAuth ({ commit }) {
        return new Promise((resolve, reject) => {
            RequestService.post(
                '/api-internal/check-auth',
                null,
                response => {
                    commit(types.SIGNIN, response);
                    resolve(response);
                }
            );
        });
    },
}