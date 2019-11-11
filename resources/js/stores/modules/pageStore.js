export default {
	namespaced: true,
	state     : {
		pages: []
	},
	mutations : {
		SET_PAGES(state, payload) {
			state.pages = payload;
		}
	},
	actions   : {
		getPages({commit}) {
			axios.get('api/pages/all').then(response => {
				commit('SET_PAGES', response.data);
			});
		},
		savePages({dispatch}, payload) {
			axios.post('api/pages/save', payload).then(response => {
				dispatch('getPages');
			});
		}
	},
	getters   : {}
}