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
		},
		deletePage({dispatch}, payload) {
			axios.post('api/pages/delete', payload).then(response => {
				dispatch('getPages');
			});
		}
	},
	getters   : {
		counter: state => {
			return state.pages.length;
		},
		home: state => {
			var home = null;
			for (var i in state.pages) {
				var page = state.pages[i];
				if (page.key == "home") {
					home = page;
				}
			}
			return page;
		}
	}
}