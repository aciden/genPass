import Vue from 'vue';
import Router from 'vue-router';

import Main from '@/components/pages/main/main';
import Notepad from '@/components/pages/notepad/notepad';
import Applications from '@/components/pages/applications/applications';
import Passwords from '@/components/pages/applications/passwords/passwords';
import SignIn from '@/components/modules/signin/signin';

Vue.use(Router);

export default new Router({
    mode: 'history',
    linkActiveClass: 'is-active',
    routes: [
        {
            path: '/',
            name: 'Main',
            component: Main,
            meta: {
                title: 'Главная',
                showProgressBar: false
            }
        },
        {
            path: '/sign-in',
            name: 'SignIn',
            component: SignIn,
            meta: {
                title: 'Авторизация',
                showProgressBar: false
            }
        },
        {
            path: '/notepad',
            name: 'Notepad',
            component: Notepad,
            meta: {
                title: 'Блокнот',
                showProgressBar: false
            }
        },
        {
            path: '/passwords',
            name: 'Applications',
            component: Applications,
            meta: {
                title: 'Пароли',
                showProgressBar: false
            },
            children: [
                {
                    path: ':applicationID',
                    component: Passwords,
                    name: 'Passwords',
                    meta: {
                        title: 'Пароли',
                        showProgressBar: false
                    },
                },
            ]
        },
    ]
})
