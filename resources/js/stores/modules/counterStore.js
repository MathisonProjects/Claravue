import axios from 'axios';

export default {
	namespaced: true,
	state     : {
		users: 0
	},
	mutations : {
		SET_USERS(state, payload) {
			state.users = payload
		}
	},
	actions   : {
		getUserCount({commit}) {
			axios.get('/api/user/count').then(response => {
				commit('SET_USERS', response.data);
			})
		}
	},
	getters   : {}
}