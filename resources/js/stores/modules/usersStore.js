export default {
	namespaced: true,
	state     : {
		users: []
	},
	mutations : {
		SET_USERS(state, payload) {
			state.users = payload;
		}
	},
	actions   : {
		getUsers({commit}) {
			axios.get('/api/users/all').then(response => {
				commit('SET_USERS', response.data);
			});
		},
		saveUsers({dispatch}, payload) {
			axios.post('api/users/save', payload).then(response => {
				dispatch('getUsers');
			});
		},
		saveUsers({dispatch}, payload) {
			axios.post('api/users/delete', payload).then(response => {
				dispatch('getUsers');
			});
		}
	},
	getters   : {
		activeUsers(state) {
			return state.users.filter(user => {
				return user.active == 1;
			});
		}
	}
}