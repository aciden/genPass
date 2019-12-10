import RequestService from '@/service/RequestService';
import * as types from './types';

export default {
    getActivePasswords ({ commit }, conditionData) {
        RequestService.request(
            '/api-internal/active-passwords/' + conditionData.applicationID,
            null,
            response => commit(types.SET_ACTIVE_PASSWORDS, response)
        );
    },
    getInactivePasswords ({ commit }, conditionData) {
        RequestService.request(
            '/api-internal/inactive-passwords/' + conditionData.applicationID,
            null,
            response => commit(types.SET_INACTIVE_PASSWORDS, response)
        );
    },
    getPassword ({ commit, state }, conditionData) {
        let password = state.activePasswords ? state.activePasswords.find(password => password.id === parseInt(conditionData.passwordID)) : null;

        commit(types.SET_PASSWORD, password)
    },
    deletePassword ({ commit }, conditionData) {
        RequestService.delete(
            '/api-internal/delete-password/' + conditionData.passwordID,
            null,
            response => commit(types.DELETE_PASSWORD, response)
        );
    },
    createPassword ({ commit, state }, conditionData) {
        RequestService.put(
            '/api-internal/create-password/' + conditionData.applicationID,
            conditionData.password,
            response => commit(types.CREATE_PASSWORD, response)
        );
    },
    updatePassword ({ commit, state }, newPassword) {
        RequestService.post(
            '/api-internal/update-password/' + state.password.id,
            newPassword,
            response => commit(types.UPDATE_PASSWORD, response)
        );
    },
    genPassword ({ commit, state }, genPasSetting) {
        return new Promise((resolve, reject) => {
            RequestService.get(
                '/api-internal/gen-password',
                genPasSetting,
                response => {
                    commit(types.SET_GEN_PASSWORD, response);
                    resolve(state.genPassword);
                }
            );
        });
    },
}