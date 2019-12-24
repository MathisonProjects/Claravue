export default {
	namespaced: true,
	state     : {
		notifications: [],
		general: [],
		user: []
	},
	mutations : {
		SET_NOTIFICATIONS(state, payload) {
			state.notifications = payload;
		},
		SET_GENERAL(state, payload) {
			state.general = payload;
		},
		SET_USER(state, payload) {
			state.user = payload;
		}
	},
	actions   : {
		getNotifications({commit}) {
			axios.get('/api/notifications/all').then(response => {
				commit('SET_NOTIFICATIONS', response.data);
			});
		},
		getNotificationsGeneral({commit}) {
			axios.get('/api/notifications/allGeneral').then(response => {
				commit('SET_GENERAL', response.data);
			});
		},
		getNotificationsUser({commit}, payload) {
			axios.get('/api/notifications/allUser', payload).then(response => {
				commit('SET_USER', response.data);
			});
		},
		setRead({dipatch}, payload) {
			axios.get('/api/notifications/setRead', payload).then(response => {
				commit('getNotificationsUser', {
					uid: payload.uid
				});
			});
		},
		saveNotifications({dispatch}, payload) {
			axios.post('/api/notifications/save', payload).then(response => {
				dispatch('getNotificationsGeneral');
			});
		},
		deleteNotification({dispatch}, payload) {
			axios.post('/api/notifications/delete', payload).then(response => {
				dispatch('getNotifications');
			});
		}
	},
	getters   : {
		generalOnlyNotifications: state => {
			return state.notifications.filter(item => {
				return item.uid == 0;
			});
		},
		generalCount: state => {
			return state.general.length;
		},
		userCount: state => {
			return state.user.length;
		}
	}
}