import Vue from 'vue'
import Resource from 'vue-resource'

Vue.use(Resource)

export default {
	fetchData (endpoint, callback, extraCallback = null) {

        Vue.http.get(endpoint).then(
            (resp)  =>  callback(resp.data),
            (resp)  =>  extraCallback(resp)
        );
    }, 

	sendData (endpoint, data, callback, extraCallback = null) {

        Vue.http.post(endpoint, data).then(
            (resp)  =>  callback(resp.data),
            (resp)  =>  extraCallback(resp)
        );
    },
}
