export default {
	namespaced: true,
	state     : {
		apis: []
	},
	mutations : {
		SET_APIS(state, payload) {
			state.apis = payload;
		}
	},
	actions   : {
		getApis({commit}) {
			axios.get('/api/apis/all').then(response => {
				commit('SET_APIS', response.data);
			});
		},
		saveApis({dispatch}, payload) {
			axios.post('/api/apis/save', payload).then(response => {
				dispatch('getApis');
			});
		},
		deleteApis({dispatch}, payload) {
			axios.post('/api/apis/delete', payload).then(response => {
				dispatch('getApis');
			});
		}
	},
	getters   : {}
}