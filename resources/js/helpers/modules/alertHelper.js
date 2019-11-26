import {store} from "@/stores";

export default {
	clearAlerts() {
		store.dispatch('alertStore/offAlert');
	},
	fireAlert(payload) {
		store.dispatch('alertStore/setAlert', payload);
		setTimeout( () => { this.clearAlerts() }, 5000)
	},
	fireSuccess(payload) {
		payload.type = 'success';
		this.fireAlert(payload);
	},
	fireInfo(payload) {
		payload.type = 'info';
		this.fireAlert(payload);
	},
	fireWarning(payload) {
		payload.type = 'warning';
		this.fireAlert(payload);
	},
	fireDanger(payload) {
		payload.type = 'danger';
		this.fireAlert(payload);
	},
	contactSent() {
		this.fireSuccess({
			icon: 'mdi-email-alert',
			text: 'Your email has been sent!'
		});
	},
	pageAdded() {
		this.fireSuccess({
			icon: 'mdi-page-next-outline',
			text: 'New page is added'
		});
	}
}