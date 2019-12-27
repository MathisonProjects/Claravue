export default {
	namespaced: true,
	state     : {
		comments: []
	},
	mutations : {
		SET_COMMENTS(state, payload) {
			state.comments = payload;
		}
	},
	actions   : {
		getComments({commit}, payload) {
			commit('SET_COMMENTS', null);
			axios.post('/api/taskCommentary/getComments', payload).then(response => {
				commit('SET_COMMENTS', response.data);
			});
		},
		saveComment({dispatch}, payload) {
			axios.post('/api/taskCommentary/save', payload).then(response => {
				dispatch('getComments', payload);
			});
		}
	},
	getters   : {
		isLoading: state => {
			if (state.comments == null) {
				return true;
			} else {
				return false;
			}
		}
	}
}