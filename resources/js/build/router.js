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
	},
	{
		// Site
		path      : '/admin',
		component : require('../layouts/AdminLayoutComponent.vue').default,
		props     : true,
		children  : [
			{
				path      : '/',
				name      : 'admin-home',
				component : require('../pages/admin/homePageComponent.vue').default,
				meta      : { title : 'Admin Home' }
			},
			{
				path      : 'users',
				name      : 'admin-users',
				component : require('../pages/admin/usersPageComponent.vue').default,
				meta      : { title : 'Admin Users' }
			},
			{
				path      : 'icons',
				name      : 'admin-icons',
				component : require('../pages/admin/iconsPageComponent.vue').default,
				meta      : { title : 'Admin Icons' }
			},
			{
				path      : 'pages',
				name      : 'admin-pages',
				component : require('../pages/admin/pagesPageComponent.vue').default,
				meta      : { title : 'Admin Pages' }
			},
			{
				path      : 'help',
				name      : 'admin-help',
				component : require('../pages/admin/helpPageComponent.vue').default,
				meta      : { title : 'Admin Help' }
			},
			{
				path      : 'settings',
				name      : 'admin-settings',
				component : require('../pages/admin/settingsPageComponent.vue').default,
				meta      : { title : 'Admin Settings' }
			}
		]
	}
];

const router = new VueRouter({
	//mode: 'history', // Something going on with apache or htaccess....
	routes: routes // short for `routes: routes`
});

export default router;