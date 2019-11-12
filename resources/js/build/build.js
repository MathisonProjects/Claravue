require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import Chat from 'vue-beautiful-chat';
import Notifications from 'vue-notification';
import VTooltip from 'v-tooltip';
import Vuetify from 'vuetify';
import 'es6-promise/auto';
import { Helper } from '../helpers';
import VuePageTitle from 'vue-page-title';
import CKEditor from '@ckeditor/ckeditor5-vue';


Vue.use(Chat);
Vue.use(Notifications);
Vue.use(VTooltip);
Vue.use(Vuetify);
Vue.use(Helper, '$Helper');
Vue.use(CKEditor);

import {store} from "../stores";
import router from "./router";

Vue.use(VuePageTitle, {
	prefix: 'Clean Laravel Vue -',
	router
});

const app = new Vue({
    el: '#app',
    store,
    router,
    vuetify: new Vuetify(),
    created() {
    	console.log('Application is running...');
    	store.dispatch('settingsStore/getSettings');
    }
});
