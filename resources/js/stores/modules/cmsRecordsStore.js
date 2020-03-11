const storeDataSet = {
	endpoint: '/api/cms_records',
	getAction: 'getStore'
};

export default {
	namespaced: true,
	state     : {
		records: []
	},
	mutations : {
		SET_STORE(state, payload) {
			state.records = payload;
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