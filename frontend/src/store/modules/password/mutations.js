import * as types from './types';

export default {
    [types.SET_ACTIVE_PASSWORDS] (state, activePasswords) {
        state.activePasswords = activePasswords;
    },
    [types.SET_INACTIVE_PASSWORDS] (state, inactivePasswords) {
        state.inactivePasswords = inactivePasswords;
    },
    [types.SET_PASSWORD] (state, password) {
        state.password = password;
    },
    [types.DELETE_PASSWORD] (state, password) {
        state.activePasswords = state.activePasswords.filter(activePassword => activePassword.id !== password.id);
        state.inactivePasswords.push(password);
    },
    [types.CREATE_PASSWORD] (state, password) {
        state.activePasswords.push(password);
        state.password = password;
    },
    [types.UPDATE_PASSWORD] (state, password) {
        state.activePasswords = state.activePasswords.filter(activePassword => activePassword.id !== state.password.id);
        state.inactivePasswords.push(state.password);
        state.password = password;
        state.activePasswords.push(password);
    },
    [types.SET_GEN_PASSWORD] (state, password, object) {
        state.genPassword = password.password;
    },
};
