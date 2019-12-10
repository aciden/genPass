import { mapGetters } from 'vuex';
import { required } from 'vuelidate/lib/validators';

export default {
    name: 'Applications',
    data() {
        return {
            application: {
                name: null
            }
        };
    },
    validations: {
        application: {
            name: {
                required
            },
        }
    },
    mounted() {
        this.$store.dispatch('application/getApplicationList');
    },
    computed: mapGetters({
        applicationList: 'application/getApplicationList',
    }),
    methods: {
        modalEditApplication: function () {
            this.application.name = null;
            this.$refs.modalEditApplication.show();
        },
        createApplication: function () {
            if (! this.$v.$invalid) {
                this.$store.dispatch('application/createApplication', this.application).then(response => {
                    let applicationId = response.id;
                    this.$router.push({path: `/passwords/${applicationId}`});
                });
            }
        },
        searchApplication: function (val) {
            this.$store.dispatch('application/searchApplication', val);
        }
    }
}
