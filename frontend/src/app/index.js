import {mapGetters} from "vuex";
import NprogressContainer from 'vue-nprogress/src/NprogressContainer';

export default {
    name: 'App',
    data() {
        return {
            checkedAuth: false
        }
    },
    computed: Object.assign(
        mapGetters({
            auth: 'user/getAuth',
        }),
        {

        },
    ),
    methods: {
        checkAuth: function () {
            if (! this.auth) {
                this.$store.dispatch('user/checkAuth').then(response => {
                    this.checkedAuth = true;
                });
            }
        }
    },
    mounted() {
        this.checkAuth();
    },
    components: {
        NprogressContainer
    }
}
