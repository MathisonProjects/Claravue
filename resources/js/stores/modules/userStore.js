export default {
	namespaced: true,
	state     : {
		user: null,
		jwt: null
	},
	mutations : {
		SET_USER(state, payload) {
			state.user = payload;
		},
		SET_JWT(state, payload) {
			state.jwt = payload;
		}
	},
	actions   : {
		login({commit}, payload) { },
		register({commit}, payload) { },
		logout({commit}) {
			commit('SET_USER', null);
			commit('SET_JWT', null);

		}
	},
	getters   : {
		loggedIn(state) {
			if (state.user == null) {
				return false;
			} else {
				return true;
			}
		}
	}
}