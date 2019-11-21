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
				var data = response.data.filter(item => {
					return item !== '.gitkeep';
				});
				commit('SET_FILES', data);
			});
		},
		saveFiles({dispatch}, payload) {
			axios.post('api/files/save', payload, {
				headers: { 'Content-Type': 'multipart/form-data' }
			}).then(response => {
				dispatch('getFiles');
			});
		},
		deleteFile({dispatch}, payload) {
			axios.post('api/files/delete', payload).then(response => {
				dispatch('getFiles');
			});
		}
	},
	getters   : {
		counter: state => {
			return state.files.length;
		}
	}
}