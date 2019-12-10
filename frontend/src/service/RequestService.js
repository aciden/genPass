import Vue from "vue";

export default class RequestService {

    static request(url, conditionData, callback, before = null) {
        Vue.http.get(url, {params: conditionData, showProgressBar: true}).then((response) => {
            callback(response.body);
        });
    }

    static get(url, conditionData, callback) {
        Vue.http.get(url, {params: conditionData, showProgressBar: true}).then((response) => {
            callback(response.body);
        });
    }

    static delete(url, conditionData, callback) {
        Vue.http.delete(url, {params: conditionData, showProgressBar: true}).then((response) => {
            callback(response.body);
        });
    }

    static put(url, conditionData, callback) {
        Vue.http.put(url, conditionData, {emulateJSON: true}).then((response) => {
            callback(response.body);
        });
    }

    static post(url, conditionData, callback) {
        Vue.http.post(url, conditionData, {emulateJSON: true, showProgressBar: true}).then((response) => {
            callback(response.body);
        }).catch(() => {
            callback(null);
        });
    }
}
