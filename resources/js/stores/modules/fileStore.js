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
				commit('SET_FILES', response.data);
			});
		},
		saveFiles({dispatch}, payload) {
			axios.post('api/files/save', payload, {
				headers: { 'Content-Type': 'multipart/form-data' }
			}).then(response => {
				dispatch('getFiles');
			});
		}
	},
	getters   : {}
}