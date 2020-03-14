import JsonStore from '@/json';

export default {
	state: JsonStore,
	mutations: {
		DO_RESET(state, payload) {
			state = payload;
		},
		SET_STATE_ITEM(state, payload) {
			state[payload.item] = payload.store;
		}
	},
	actions: {
		reset({commit}) {
			for (var i in JsonStore) {
				var data = {
					item : i,
					store: JsonStore[i]
				}
				commit('SET_STATE_ITEM', data);
			}
		}
	}
}