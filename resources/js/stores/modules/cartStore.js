export default {
	namespaced: true,
	state     : {
		cart: []
	},
	mutations : {
		SET_STOREVAR(state, payload) {
			state.cart = payload;
		}
	},
	actions   : { },
	getters   : { }
}