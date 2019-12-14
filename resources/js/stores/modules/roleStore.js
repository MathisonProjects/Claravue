export default {
	namespaced: true,
	state     : {
		roles: []
	},
	mutations : {
		SET_ROLES(state, payload) {
			state.roles = payload;
		}
	},
	actions   : {
		getRoles({commit}) {
			axios.get('/api/roles/all').then(response => {
				commit('SET_ROLES', response.data);
			});
		},
		saveRole({dispatch}, payload) {
			axios.post('api/roles/save', payload).then(response => {
				dispatch('getRoles');
			});
		},
		deleteRole({dispatch}, payload) {
			axios.post('api/roles/delete', payload).then(response => {
				dispatch('getRoles');
			});
		}
	},
	getters   : {}
}