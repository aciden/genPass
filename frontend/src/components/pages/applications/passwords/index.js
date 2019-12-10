import { mapGetters } from 'vuex';
import { required } from 'vuelidate/lib/validators';

export default {
    name: 'Passwords',
    props: {

    },
    data: () => {
        return {
            activePasswordsTableFields: {
                login: {
                    label: 'Логин'
                },
                password: {
                    label: 'Пароль'
                },
                date: {
                    label: 'Дата создания'
                },
                actions: {
                    label: '&nbsp;'
                }
            },
            inactivePasswordsTableFields: {
                login: {
                    label: 'Логин'
                },
                password: {
                    label: 'Пароль'
                },
                date_delete: {
                    label: 'Дата удаления'
                },
            },
            generatePasswordSetting: {
                length: 10,
                selected: [
                    'numeric', 'letters'
                ],
                options: [
                    {text: 'Цифры', value: 'numeric', disabled: true, buttonVariant: 'primary'},
                    {text: 'Буквы', value: 'letters'},
                    {text: 'Символы', value: 'symbol'},
                ]
            },
            passwordID: null,
            passwordLocal: {
                id: null,
                login: null,
                password: null
            },
        };
    },
    validations: {
        passwordLocal: {
            login: {
                required
            },
            password: {
                required
            },
        }
    },
    computed: Object.assign(
        mapGetters({
            activePasswords: 'password/getActivePasswords',
            inactivePasswords: 'password/getInactivePasswords',
            password: 'password/getPassword',
            applicationById: 'application/getApplicationById',
            genPassword: 'password/getGenPassword',
        }),
        {
            applicationID() {

                return parseInt(this.$route.params.applicationID, 10);
            },
            application() {

                return this.applicationById(this.applicationID) || {name: null};
            },
        },
    ),
    mounted () {
        this.getActivePasswords(this.applicationID);
    },
    watch: {
        applicationID: 'getActivePasswords',
    },
    methods: {
        getActivePasswords: function(applicationID) {
            this.$store.dispatch('password/getActivePasswords', {applicationID: applicationID});
            this.$store.dispatch('password/getInactivePasswords', {applicationID: applicationID});
        },
        modalConfirmDelete: function(passwordID) {
            this.passwordID = passwordID;
            this.$refs.modalConfirmDeletePassword.show();
        },
        handleDeletePassword: function() {
            this.$store.dispatch('password/deletePassword', {passwordID: this.passwordID});
            this.clearDeletePassword();
        },
        clearDeletePassword: function () {
            this.passwordID = null;
        },
        modalEditPassword: function (passwordID) {
            this.$store.dispatch('password/getPassword', {passwordID: passwordID});
            this.passwordLocal = {
                id: this.password.id,
                login: this.password.login,
                password: this.password.password,
            };
            this.$refs.modalEditPassword.show();
        },
        modalCreatePassword: function () {
            this.clearLocalPassword();
            this.$refs.modalEditPassword.show();
        },
        editPassword: function() {
            if (! this.$v.$invalid) {
                if (this.passwordLocal.id) {
                    this.updatePassword();
                } else {
                    this.createPassword();
                }
            }
        },
        updatePassword: function() {
            this.$store.dispatch('password/updatePassword', this.passwordLocal);
        },
        createPassword: function () {
            this.$store.dispatch('password/createPassword', {applicationID: this.applicationID, password: this.passwordLocal});
        },
        clearLocalPassword: function () {
            this.passwordLocal = {
                id: null,
                login: null,
                password: null
            };
        },
        generatePassword: function () {
            this.$store.dispatch(
                'password/genPassword',
                {length: this.generatePasswordSetting.length, options: this.generatePasswordSetting.selected},
            ).then(genPass => {
                this.passwordLocal.password = genPass;
                this.$refs.popoverGeneratePassword.$emit('close');
            });
        },
    }
}
