import {store} from "@/stores";

export default {
	clearNotifications() {},
	sendMessage() {},
	updateSettings() {},
	logout() {
		store.dispatch('userStore/logout');
	}
}