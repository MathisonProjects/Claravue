import _ from 'lodash';

export default {
	namespaced: true,
	state    : {
		projects  : {},
		categories: {},
		tasks     : {},
		loading: false
	},
	mutations: {
		SET_PROJECTS(state, payload) {
			state.projects   = payload;
		},
		SET_CATEGORIES(state, payload) {
			state.categories = payload;
		},
		SET_TASKS(state, payload) {
			state.tasks      = payload;
		},
		SET_LOADING(state, payload) {
			state.loading   = payload;
		}
	},
	actions  : {
		refreshTasks({commit}) {
			commit('SET_LOADING'  , true);
			axios.post('api/todo/getRefresh').then(response => {
				var data = response.data;
				commit('SET_PROJECTS'  , data.projects);
				commit('SET_CATEGORIES', data.categories);
				commit('SET_TASKS'     , data.tasks);
				commit('SET_LOADING'  , false);
			});
		},
		saveProject({dispatch}, payload) {
			axios.post('api/todo/saveProject', payload).then(response => {
				dispatch('refreshTasks');
			});
		},
		deleteProject({dispatch}, payload) {
			axios.post('api/todo/deleteProject', payload).then(response => {
				dispatch('refreshTasks');
			});
		},
		saveCategory({dispatch}, payload) {
			axios.post('api/todo/saveCategory', payload).then(response => {
				dispatch('refreshTasks');
			});
		},
		deleteCategory({dispatch}, payload) {
			axios.post('api/todo/deleteCategory', payload).then(response => {
				dispatch('refreshTasks');
			});
		},
		saveTask({dispatch}, payload) {
			axios.post('api/todo/saveTask', payload).then(response => {
				dispatch('refreshTasks');
			});
		},
		deleteTask({dispatch}, payload) {
			axios.post('api/todo/deleteTask', payload).then(response => {
				dispatch('refreshTasks');
			});
		}
	},
	getters: {
		hasTasks : state => {
			if (_.isEmpty(state.tasks)) {
				return false;
			} else {
				return true;
			}
		}
	}

}