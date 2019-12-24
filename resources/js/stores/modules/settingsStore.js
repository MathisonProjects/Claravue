export default {
	namespaced: true,
	state     : {
		settings: {}
	},
	mutations : {
		SET_SETTINGS(state, payload) {
			state.settings = payload;
		}
	},
	actions   : {
		getSettings({commit}) {
			axios.get('/api/setting/all').then(response => {
				commit('SET_SETTINGS', response.data);
			});
		},
		saveSettings({dispatch}, payload) {
			axios.post('/api/setting/save', payload).then(response => {
				dispatch('getSettings');
			});
		}
	},
	getters   : {}
}