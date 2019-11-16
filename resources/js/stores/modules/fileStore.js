export default {
	namespaced: true,
	state     : {
		files: []
	},
	mutations : {
		SET_FILES(state, payload) {
			state.files = payload;
		}
	},
	actions   : {
		getFiles({commit}) {
			axios.get('/api/files/all').then(response => {
				commit('SET_files', response.data);
			});
		},
		saveFiles({dispatch}, payload) {
			axios.post('api/files/save', payload).then(response => {
				dispatch('getFiles');
			});
		}
	},
	getters   : {}
}