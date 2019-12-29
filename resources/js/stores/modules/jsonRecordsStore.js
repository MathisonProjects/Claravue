export default {
	namespaced: true,
	state     : {
		json: []
	},
	mutations : {
		SET_JSON(state, payload) {
			state.json = payload;
		}
	},
	actions   : {
		getJson({commit}) {
			axios.get('/api/jsonRecords/all').then(response => {
				commit('SET_JSON', response.data);
			});
		},
		savejson({dispatch}, payload) {
			axios.post('/api/jsonRecords/save', payload).then(response => {
				dispatch('getJson');
			});
		},
		deleteJson({dispatch}, payload) {
			axios.post('/api/jsonRecords/delete', payload).then(response => {
				dispatch('getJson');
			});
		}
	},
	getters   : {}
}