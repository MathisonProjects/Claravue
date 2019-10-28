import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

const routes = [
	{
		// Site
		path      : '/',
		component : require('../layouts/DefaultLayoutComponent.vue').default,
		props     : true,
		children  : [
			{
				path      : '/',
				name      : 'home-home',
				component : require('../pages/HomeComponent.vue').default,
				meta      : { title : 'Home' }
			},
			{
				path      : 'stylesheet',
				name      : 'home-stylesheet',
				component : require('../pages/StylesheetComponent.vue').default,
				meta      : { title : 'Stylesheet' }
			}
		]
	}
];

const router = new VueRouter({
	//mode: 'history', // Something going on with apache or htaccess....
	routes: routes // short for `routes: routes`
});

export default router;