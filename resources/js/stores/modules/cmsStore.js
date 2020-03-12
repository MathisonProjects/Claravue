const storeDataSet = {
	endpoint: '/api/cms',
	getAction: 'getStore'
};

export default {
	namespaced: true,
	state     : {
		modules: []
	},
	mutations : {
		SET_STORE(state, payload) {
			state.modules = payload;
		}
	},
	actions   : {
		getStore({commit}) {
			axios.get(storeDataSet.endpoint + '/all').then(response => {
				commit('SET_STORE', response.data);
			});
		},
		saveStore({dispatch}, payload) {
			axios.post(storeDataSet.endpoint + '/save', payload).then(response => {
				dispatch(storeDataSet.getAction);
			});
		},
		deleteStore({dispatch}, payload) {
			axios.post(storeDataSet.endpoint + '/delete', payload).then(response => {
				dispatch(storeDataSet.getAction);
			});
		}
	},
	getters   : {}
}