export default {
	namespaced: true,
	state     : {
		results: []
	},
	mutations : {
		SET_RESULTS(state, payload) {
			state.results = payload;
		}
	},
	actions   : {
		getResults({commit}) {
			axios.get('/api/interest/all').then(response => {
				commit('SET_RESULTS', response.data);
			});
		},
		saveResult({dispatch}, payload) {
			axios.post('api/interest/save', payload).then(response => {
				dispatch('getResults');
			});
		},
		deleteResult({dispatch}, payload) {
			axios.post('api/interest/delete', payload).then(response => {
				dispatch('getResults');
			});
		}
	},
	getters   : {
		counter: state => {
			return state.results.length;
		}
	}
}