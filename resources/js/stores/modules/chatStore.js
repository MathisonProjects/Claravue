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
		setHistorical({commit}, payload) {
			commit('SET_HISTORICAL', payload);
		},
		setChat({commit}, payload) {
			commit('SET_CHAT', payload);
		}
	},
	getters   : {}
}