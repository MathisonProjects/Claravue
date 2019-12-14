export default {
	namespaced: true,
	state     : {
		display: false,
		icon: '',
		type: '',
		text: ''
	},
	mutations : {
		SET_DISPLAY(state, payload) {
			state.display = payload;
		},
		SET_ICON(state, payload) {
			state.icon = payload;
		},
		SET_TYPE(state, payload) {
			state.type = payload;
		},
		SET_TEXT(state, payload) {
			state.text = payload;
		}
	},
	actions   : {
		setAlert({commit}, payload) {
			commit('SET_ICON', payload.icon);
			commit('SET_TYPE', payload.type);
			commit('SET_TEXT', payload.text);
			commit('SET_DISPLAY', true);
		},
		offAlert({commit}) {
			commit('SET_DISPLAY', false);
		}
	},
	getters   : {}
}