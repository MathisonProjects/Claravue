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
	getHistorical() {
		var payload = {};
		this.sendUp('getHistorical', payload);
	},
	getChat(payload) {
		this.sendUp('getChat', payload);
	},
	sendMessage(payload) {
		this.sendUp('sendChat', payload);
	}
}