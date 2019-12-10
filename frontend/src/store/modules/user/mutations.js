import * as types from './types';

export default {
    [types.SIGNIN] (state, user) {
        if (user && user.id) {
            state.auth = true;
            state.user = user;
        }
    },
    [types.SIGNOUT] (state) {

        state.auth = false;
        state.user = null;
    },
};
