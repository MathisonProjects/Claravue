export default {
	namespaced: true,
	state     : {
		blog: []
	},
	mutations : {
		SET_BLOG(state, payload) {
			state.blog = payload;
		}
	},
	actions   : {
		getBlogs({commit}) {
			axios.get('/api/blog/all').then(response => {
				commit('SET_BLOG', response.data);
			});
		},
		saveBlog({dispatch}, payload) {
			axios.post('api/blog/save', payload).then(response => {
				dispatch('getBlogs');
			});
		},
		deleteBlog({dispatch}, payload) {
			axios.post('api/blog/delete', payload).then(response => {
				dispatch('getBlogs');
			});
		}
	},
	getters   : {}
}