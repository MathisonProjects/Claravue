import alertHelper from '@/helpers/modules/alertHelper';

export default {
	namespaced: true,
	state     : {
		categories: [],
		items: [],
		transactions: []
	},
	mutations : {
		SET_CATEGORIES(state, payload) {
			state.categories = payload;
		},
		SET_ITEMS(state, payload) {
			state.items = payload;
		},
		SET_TRANSACTIONS(state, payload) {
			state.transactions = payload;
		}
	},
	actions   : {
		getCategories({commit}) {
			axios.get('/api/store/categories/all').then(response => {
				commit('SET_CATEGORIES', response.data);
			});
		},
		getItems({commit}) {
			axios.get('/api/store/items/all').then(response => {
				commit('SET_ITEMS', response.data);
			});
		},
		getTransactions({commit}) {
			axios.get('/api/store/transactions/all').then(response => {
				commit('SET_TRANSACTIONS', response.data);
			});
		},
		saveCategory({dispatch}, payload) {
			axios.post('/api/store/categories/save', payload).then(response => {
				alertHelper.categorySaved();
				dispatch('getCategories');
			});
		},
		saveItems({dispatch}, payload) {
			axios.post('/api/store/items/save', payload).then(response => {
				alertHelper.productSaved();
				dispatch('getItems');
			});
		},
		saveTransactions({dispatch}, payload) {
			axios.post('/api/store/transactions/save', payload).then(response => {
				dispatch('getTransactions');
			});
		},
		deleteCategories({dispatch}, payload) {
			axios.post('/api/store/categories/delete', payload).then(response => {
				dispatch('getCategories');
			});
		},
		deleteItems({dispatch}, payload) {
			axios.post('/api/store/items/delete', payload).then(response => {
				dispatch('getItems');
			});
		},
		deleteTransactions({dispatch}, payload) {
			axios.post('/api/store/transactions/delete', payload).then(response => {
				dispatch('getTransactions');
			});
		}
	},
	getters   : {}
}