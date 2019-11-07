import axios from 'axios';

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
		getUserByToken({commit, state}) {
			var config = {
				headers: {'Authorization': "Bearer " + state.jwt}
			};

			axios.get('api/user', config).then(response => {
				commit('SET_USER', response.data);
			})
		},
		login({commit, dispatch}, payload) {
			axios.post('api/login', payload).then(response => {
				commit('SET_JWT', response.data.token);
				dispatch('getUserByToken');
			})
		},
		register({commit, dispatch}, payload) {
			axios.post('api/register', payload).then(response => {
				commit('SET_JWT', response.data.token);
				dispatch('getUserByToken');
			})
		},
		logout({commit}) {
			commit('SET_USER', null);
			commit('SET_JWT', null);

			axios.post('api/logout').then(response => {
				console.log(response.data);
			})
		}
	},
	getters   : {
		loggedIn(state) {
			if (state.user == null && state.jwt == null) {
				return false;
			} else {
				return true;
			}
		}
	}
}