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
				commit('SET_MENU', response.data);
			});
		},
		saveMenu({dispatch}, payload) {
			axios.post('api/menu/save', payload).then(response => {
				dispatch('getMenu');
			});
		},
		deleteMenu({dispatch}, payload) {
			axios.post('api/menu/delete', payload).then(response => {
				dispatch('getMenu');
			});
		}
	},
	getters   : {
		counter: state => {
			return state.menu.length;
		}
	}
}