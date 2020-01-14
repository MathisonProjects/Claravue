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
				path      : 'shop',
				name      : 'home-shop',
				component : require('../pages/shopComponent.vue').default,
				meta      : { title : 'Shop' }
			},
			{
				path      : 'shop/:pid',
				name      : 'home-shop-product',
				component : require('../pages/productPageComponent.vue').default,
				meta      : { title : 'Product Page' }
			},
			{
				path      : 'cart',
				name      : 'home-cart',
				component : require('../pages/cartComponent.vue').default,
				meta      : { title : 'Cart' }
			},
			{
				path      : 'checkout',
				name      : 'home-checkout',
				component : require('../pages/checkoutComponent.vue').default,
				meta      : { title : 'Checkout' }
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
				meta      : { title : 'Blog Page', blog: true }
			},
			{
				path      : 'fullscreen',
				name      : 'fullscreen-page',
				component : require('../pages/fullscreenComponent.vue').default,
				meta      : { title: 'Fullscreen Option' }
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
				path      : 'json',
				name      : 'admin-json',
				component : require('../pages/admin/jsonPageComponent.vue').default,
				meta      : { title : 'Admin JSON Records' }
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
				path      : 'todo',
				name      : 'admin-todo-general',
				component : require('../pages/admin/todoComponent.vue').default,
				meta      : { title : 'Admin Todo' }
			},
			{
				path      : 'todo/:pid',
				name      : 'admin-todo-project',
				component : require('../pages/admin/todoComponent.vue').default,
				meta      : { title : 'Admin Todo Project' }
			},
			{
				path      : 'todo/:pid/:catid',
				name      : 'admin-todo-category',
				component : require('../pages/admin/todoComponent.vue').default,
				meta      : { title : 'Admin Todo Category' }
			},
			{
				path      : 'todo/:pid/:catid/:tid',
				name      : 'admin-tod-task',
				component : require('../pages/admin/todoComponent.vue').default,
				meta      : { title : 'Admin Todo Task' }
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
	},
	{
		// Site
		path      : '/member',
		component : require('../layouts/MemberLayoutComponent.vue').default,
		props     : true,
		children  : [
			{
				path      : '/',
				name      : 'member-home',
				component : require('../pages/member/memberHomeComponent.vue').default,
				meta      : { title : 'Member Home' }
			},
			{
				path      : 'message',
				name      : 'member-message',
				component : require('../pages/member/memberMessageComponent.vue').default,
				meta      : { title : 'Member Messages' }
			},
			{
				path      : 'settings',
				name      : 'member-settings',
				component : require('../pages/member/memberSettingsComponent.vue').default,
				meta      : { title : 'Member Settings' }
			},
			{
				path      : 'notifications',
				name      : 'member-notifications',
				component : require('../pages/member/memberNotificationsComponent.vue').default,
				meta      : { title : 'Member Notifications' }
			}
		]
	}
];

const router = new VueRouter({
	mode: 'history', // Something going on with apache or htaccess....
	routes: routes // short for `routes: routes`
});

export default router;