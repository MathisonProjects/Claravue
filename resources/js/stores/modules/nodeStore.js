export default {
	namespaced: true,
	state     : {
		active: false
	},
	mutations : {
		SET_ACTIVE(state, payload) {
			state.active = payload;
		}
	},
	actions   : {
		activateStore({commit}) {
			commit('SET_ACTIVE', true);
		},
		deactivateStore({commit}) {
			commit('SET_ACTIVE', false);
		}
	},
	getters   : {
		active(state) {
			return state.active;
		}
	}
}