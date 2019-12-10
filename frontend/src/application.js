import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import VueResource from 'vue-resource';
import router from './router';
import store from './store';
import Vuelidate from 'vuelidate';
import NProgress from 'vue-nprogress';



import App from './app/app.vue';
import AppNavbar from './components/modules/navbar/navbar.vue';
import AppSignin from './components/modules/signin/signin.vue';

import { InputGroup } from 'bootstrap-vue/es/components';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'





class Application {

    run() {

        this.configuration();
        this.registerComponent();

        const options = {
            latencyThreshold: 100,
        };

        Vue.use(BootstrapVue);
        Vue.use(InputGroup);
        Vue.use(VueResource);
        Vue.use(Vuelidate);
        Vue.use(NProgress, options);

        let nprogress = new NProgress({ className: '.nprogress-container', parent: '#app' });

        (new Vue({
            nprogress,
            el: '#app',
            store,
            router,
            components: { App },
            template: '<App/>'
        }));
    }

    configuration() {

        router.beforeEach((to, from, next) => {
            document.title = to.meta.title;
            next();
        });

    }

    registerComponent() {
        Vue.component('app-navbar', AppNavbar);
        Vue.component('app-signin', AppSignin);
    }

}

let app = new Application();
app.run();
