import {mapGetters} from "vuex";

export default {
    name: 'AppNavbar',
    computed: Object.assign(
        mapGetters({
            user: 'user/getAuthUser',
        }),
        {}
    ),
    methods: {
        signout: function () {
            this.$store.dispatch('user/signout');
        }
    }
}
