export default {
	namespaced: true,
	state     : {
		cart: []
	},
	mutations : {
		SET_CART(state, payload) {
			state.cart = payload;
		}
	},
	actions   : {
		addToCart({ commit, state }, payload) {
			var cart = state.cart;
			cart.push(payload);
			commit('SET_CART', cart);
		},
		removeFromCart({ commit }, payload) {

		},
		emptyCart({ commit }) {
			commit('SET_CART', []);
		}
	},
	getters   : {
		totalItems(state) {
			return state.cart.length;
		},
		totalPrice(state) {
			var price = 0;
			for (var i in state.cart) {
				var item = state.cart[i];
				price += parseFloat(item.amount);

			}
			return price;
		}
	}
}