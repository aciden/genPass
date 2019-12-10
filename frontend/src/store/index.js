import Vue from 'vue';
import Vuex from 'vuex';

import application from './modules/application';
import password from './modules/password';
import user from './modules/user';
import notepad from './modules/notepad';
import notepadItem from './modules/notepadItem';
import notepadItemPost from './modules/notepadItemPost';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        application,
        password,
        user,
        notepad,
        notepadItem,
        notepadItemPost
    },
    strict: process.env.APP_ENV === 'dev',
})
