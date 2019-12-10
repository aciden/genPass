import { required } from 'vuelidate/lib/validators';

export default {
    name: 'SignIn',
    data() {
        return {
            userData: {},
            errorSignIn: false
        }
    },
    validations: {
        userData: {
            login: {
                required
            },
            password: {
                required
            },
        }
    },
    methods: {
        signin: function (event) {
            if (! this.$v.$invalid) {
                this.$store.dispatch('user/signin', this.userData)
                    .then(resolve => {
                        if (! resolve) {
                            this.errorSignIn = true;
                        }
                    });
            }

            event.preventDefault();
        },
        errorClear: function () {
            this.errorSignIn = false;
        }
    }
}
