export default {
	namespaced: true,
	state     : {
		historical: [
			{
				id: 'global',
				icon: 'fas fa-globe',
				count: 0,
				name: 'Global'
			},
			{
				id: 'self',
				icon: 'fas fa-sticky-note',
				count: 0,
				name: 'Self'
			}
		],
		chat: []
	},
	mutations : {
		SET_HISTORICAL(state, payload) {
			state.historical = payload;
		},
		SET_CHAT(state, payload) {
			state.chat = payload;
		}
	},
	actions   : {
		setChatNull({commit}) {
			commit('SET_CHAT', null);
		},
		setHistorical({commit}, payload) {
			commit('SET_HISTORICAL', payload);
		},
		setChat({commit}, payload) {
			commit('SET_CHAT', payload);
		}
	},
	getters   : {
		loading(state) {
			return state.chat == null;
		}
	}
}