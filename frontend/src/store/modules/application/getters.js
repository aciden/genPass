export default {
    getApplicationList: state => state.applicationList,
    getApplicationById: state => id => {
        return state.applicationList ? state.applicationList.find(application => application.id === id) : null;
    }
};