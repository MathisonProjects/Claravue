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
			},
			{
				path      : 'interest',
				name      : 'home-interest',
				component : require('../pages/interestCheckComponent.vue').default,
				meta      : { title : 'Interest Check' }
			},
			{
				path      : 'member',
				name      : 'home-member',
				component : require('../pages/memberComponent.vue').default,
				meta      : { title : 'Member' }
			},
			{
				path      : 'page/:key',
				name      : 'home-page',
				component : require('../pages/pageComponent.vue').default,
				meta      : { title : 'Page' }
			},
			{
				path      : 'blog/',
				name      : 'home-blog',
				component : require('../pages/blogComponent.vue').default,
				meta      : { title : 'Blog' }
			},
			{
				path      : 'blog/:key',
				name      : 'home-blog-page',
				component : require('../pages/pageComponent.vue').default,
				meta      : { title : 'Blog Page' }
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
				path      : 'roles',
				name      : 'admin-roles',
				component : require('../pages/admin/rolesPageComponent.vue').default,
				meta      : { title : 'Admin Roles' }
			},
			{
				path      : 'notifications',
				name      : 'admin-notifications',
				component : require('../pages/admin/notificationsPageComponent.vue').default,
				meta      : { title : 'Admin Notifications' }
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
				path      : 'files',
				name      : 'admin-files',
				component : require('../pages/admin/filesPageComponent.vue').default,
				meta      : { title : 'Admin Files' }
			},
			{
				path      : 'interest',
				name      : 'admin-interest',
				component : require('../pages/admin/interestCheckPageComponent.vue').default,
				meta      : { title : 'Admin Interest' }
			},
			{
				path      : 'menu',
				name      : 'admin-menu',
				component : require('../pages/admin/menuPageComponent.vue').default,
				meta      : { title : 'Admin Main Menu' }
			},
			{
				path      : 'blog',
				name      : 'admin-blog',
				component : require('../pages/admin/blogPageComponent.vue').default,
				meta      : { title : 'Admin Blog' }
			},
			{
				path      : 'forum',
				name      : 'admin-forum',
				component : require('../pages/admin/forumPageComponent.vue').default,
				meta      : { title : 'Admin Forum' }
			},
			{
				path      : 'shop',
				name      : 'admin-shop',
				component : require('../pages/admin/shopPageComponent.vue').default,
				meta      : { title : 'Admin Shop' }
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