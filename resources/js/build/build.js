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
import BackToTop from 'vue-backtotop'
import fullscreen from 'vue-fullscreen';
 
Vue.use(Chat);
Vue.use(Notifications);
Vue.use(VTooltip);
Vue.use(Vuetify);
Vue.use(Helper, '$Helper');
Vue.use(CKEditor);
Vue.use(BackToTop)
Vue.use(fullscreen);

import {store} from "../stores";
import router from "./router";

if (store.state.settingsStore.settings.name) {
    Vue.use(VuePageTitle, {
        prefix: store.state.settingsStore.settings.name + ' -',
        router
    });
} else {
    Vue.use(VuePageTitle, {
        prefix: 'Clean Laravel Vue -',
        router
    });
}


const app = new Vue({
    el: '#app',
    store,
    router,
    vuetify: new Vuetify({
        theme: {
            dark: false,
            themes: {
                dark: {
                    primary: '#21CFF3',
                    accent: '#FF4081',
                    secondary: '#ffe18d',
                    success: '#4CAF50',
                    info: '#2196F3',
                    warning: '#FB8C00',
                    error: '#FF5252',
                    background: '#303030'
                },
                light: {
                    primary: '#1976D2',
                    accent: '#e91e63',
                    secondary: '#30b1dc',
                    success: '#4CAF50',
                    info: '#2196F3',
                    warning: '#FB8C00',
                    error: '#FF5252',
                    background: '#fafafa'
                }
            }
        },
    }),
    created() {
    	console.log('Application is running...');
        this.$Helper.nodeServer.setUp();
        this.$Helper.nodeServer.getDevelopmentMode();
        this.$Helper.bootHelper.init();
    }
});
