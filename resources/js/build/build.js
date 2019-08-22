require('./bootstrap');

import Vue from 'vue';
import BootstrapVue   from 'bootstrap-vue';
import Vuex from 'vuex';
import Chat from 'vue-beautiful-chat';
import Notifications from 'vue-notification';
import VTooltip from 'v-tooltip'
import 'es6-promise/auto';
import { Helper }         from '../helpers'
 

Vue.use(Chat)
Vue.use(Notifications)
Vue.use(VTooltip)
Vue.use(Helper, '$Helper');

import {store} from "../stores";
import router from "./router";

const app = new Vue({
    el: '#app',
    store,
    router,
    created() {
    	console.log('Application is running...');
    }
});
