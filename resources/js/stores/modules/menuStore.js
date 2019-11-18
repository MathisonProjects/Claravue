export default {
	namespaced: true,
	state     : {
		menu: []
	},
	mutations : {
		SET_MENU(state, payload) {
			state.menu = payload;
		}
	},
	actions   : {
		getMenu({commit}) {
			axios.get('/api/menu/all').then(response => {
				commit('SET_menu', response.data);
			});
		},
		saveMenu({dispatch}, payload) {
			axios.post('api/menu/save', payload).then(response => {
				dispatch('getFiles');
			});
		},
		deleteMenu({dispatch}, payload) {
			axios.post('api/menu/delete', payload).then(response => {
				dispatch('getFiles');
			});
		}
	},
	getters   : {}
}