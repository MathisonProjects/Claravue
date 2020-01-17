import {store} from '@/stores';
import {textList} from '@enum';

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
			text: textList.EMAIL_SENT
		});
	},
	pageAdded() {
		this.fireSuccess({
			icon: 'mdi-page-next-outline',
			text: textList.NEW_PAGE
		});
	},
	settingsSaved() {
		this.fireSuccess({
			icon: 'mdi-content-save-outline',
			text: textList.SETTINGS_SAVED
		});	
	},
	loggedIn() {
		this.fireSuccess({
			icon: 'mdi-content-save-outline',
			text: textList.LOGGED_IN
		});	
	},
	categorySaved() {
		this.fireSuccess({
			icon: 'mdi-page-next-outline',
			text: textList.CATEGORY_SAVED
		});
	},
	productSaved() {
		this.fireSuccess({
			icon: 'mdi-page-next-outline',
			text: textList.PRODUCT_SAVED
		});
	},
	addedToCart() {
		this.fireSuccess({
			icon: 'mdi-cart-arrow-down',
			text: textList.CART_ADDED
		});
	},
	removedFromCart() {
		this.fireSuccess({
			icon: 'mdi-cart-arrow-up',
			text: textList.CART_REMOVED
		});
	},
	emptiedCart() {
		this.fireSuccess({
			icon: 'mdi-cart-arrow-up',
			text: textList.CART_EMPTIED
		});
	},
}