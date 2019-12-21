import io from 'socket.io-client';
import {store} from "../../stores";

export default {
	setUp() {
		this.socket = io.connect('https://dev-vuelaravelclean-com.mathisonprojects.dev', {
		    'reconnection'         : true,
		    'reconnectionDelay'    : 1000,
		    'reconnectionDelayMax' : 5000,
		    'reconnectionAttempts' : 3
		});
		
		// Create all of the listeners and route them
		this.socket.on('init response', (payload) => {
			console.log('Node Server is active');
			store.dispatch('nodeStore/activateStore');
		});

		this.socket.on('NodeResponse', (payload) => {
			console.log(payload.log);
		});
		this.socket.on('setHistorical', (payload) => {
			store.dispatch('chatStore/setHistorical', payload);
		});
		this.socket.on('setChat', (payload) => {
			store.dispatch('chatStore/setChat', payload);
		});

		this.socket.on('listenChat', (payload) => {
			if (store.state.chatStore.chatId == payload.id) {
				this.sendUp('getChat', payload);
			}
		});

		this.socket.on('ModeResponse', (payload => {
			if (payload.result.value == 'on') {
				store.dispatch('cloudflareStore/setDevMode', true);
			} else {
				store.dispatch('cloudflareStore/setDevMode', false);
			}
		}));

		this.socket.on('forceChatUpdate', (payload) => {});
	},
	sendUp(endpoint, args = null) {
		// Makes it possible to communicate with node live
		if (args == null) {
			this.socket.emit(endpoint);
		} else {
			this.socket.emit(endpoint, args);
		}
	},
	getHistorical(payload) {
		this.sendUp('getHistorical', payload);
	},
	getChat(payload) {
		this.sendUp('getChat', payload);
	},
	sendMessage(payload) {
		this.sendUp('sendChat', payload);
	},
	getDevelopmentMode() {
		var data = {
			config: {
				cf_email: store.state.settingsStore.settings.cf_email,
				cf_readKey: store.state.settingsStore.settings.cf_readKey,
				cf_zone: store.state.settingsStore.settings.cf_zone
			}
		};
		this.sendUp('getDevelopmentMode', data);
	},
	changeDevelopmentMode(payload) {
		var data = {
			config: {
				cf_email: store.state.settingsStore.settings.cf_email,
				cf_readKey: store.state.settingsStore.settings.cf_readKey,
				cf_zone: store.state.settingsStore.settings.cf_zone
			},
			mode: payload
		};
		this.sendUp('changeDevelopmentMode', data);
	}
}