<template>
	<div>
		<v-navigation-drawer v-model="primaryDrawer.model" temporary app overflow :mini-variant.sync='miniDrawer'>
			<v-list-item dense>
				<v-list-item-icon><v-icon>fab fa-dev</v-icon></v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title class="title" v-if='!settings.name'>{{ app.name }}</v-list-item-title>
					<v-list-item-title class="title" v-if='settings.name'>{{ settings.name }}</v-list-item-title>

					<v-list-item-subtitle v-if='!settings.description'>{{ app.desc }}</v-list-item-subtitle>
					<v-list-item-subtitle v-if='settings.description'>{{ settings.description }}</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-divider></v-divider>
			<v-list-item dense>
				<v-list-item-icon>
					<v-avatar color="primary" size="30">
						<span class="white--text">JM</span>
					</v-avatar>
				</v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title class="title">{{ user.name }}</v-list-item-title>
					<v-list-item-subtitle>
						<v-btn text icon color="blue" @click='$router.push("/admin/settings")'><v-icon>mdi-account-edit</v-icon></v-btn>
						<v-btn text icon color="blue" @click='$router.push("/admin/settings")'><v-icon>mdi-settings</v-icon></v-btn>
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			
			<v-divider></v-divider>
			<v-list dense nav>
				<v-list-item link v-for='(link, index) in linksCleaned' :key='index'  @click='navPage(link)'>
					<v-list-item-icon><v-icon>{{ link.icon }}</v-icon></v-list-item-icon>
					<v-list-item-content><v-list-item-title>{{ link.text }}</v-list-item-title></v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>

		<v-app-bar :clipped-left="primaryDrawer.clipped" app dense>
			<v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent'" @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
			<v-toolbar-title v-if='!settings.name'>
				<v-btn text @click='navPage(linksList[0])'>{{ app.name }}</v-btn>
			</v-toolbar-title>
			<v-toolbar-title v-if='settings.name'>
				<v-btn text @click='navPage(linksList[0])'>{{ settings.name }}</v-btn>
			</v-toolbar-title>
		</v-app-bar>
	</div>
</template>

<script>
	export default {
		name      : "header-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				drawers: ['Default (no property)', 'Permanent', 'Temporary'],
				primaryDrawer: {
					model: null,
					type: 'default (no property)',
					clipped: false,
					floating: false,
					mini: false,
				},
				miniDrawer: true,
				app: {
					name: 'Mathison Projects',
					desc: 'App desc'
				},
				linksList: [
					{
						icon: 'mdi-home',
						text: 'Home',
						link: '/admin'
					},
					{
						icon: 'mdi-account-group',
						text: 'Users',
						link: '/admin/users'
					},
					{
						icon: 'mdi-account-badge',
						text: 'Roles',
						link: '/admin/roles'
					},
					{
						icon: 'mdi-bell-circle',
						text: 'Global Notifications',
						link: '/admin/notifications'
					},
					{
						icon: 'mdi-material-design',
						text: 'Icons',
						link: '/admin/icons'
					},
					{
						icon: 'mdi-menu',
						text: 'Main Menu',
						link: '/admin/menu'
					},
					{
						icon: 'mdi-file-outline',
						text: 'Pages',
						link: '/admin/pages'
					},
					{
						icon: 'mdi-folder-open',
						text: 'Files',
						link: '/admin/files'
					},
					{
						icon: 'mdi-lightbulb',
						text: 'Interest',
						link: '/admin/interest'
					},
					{
						icon: 'mdi-json',
						text: 'JSON Records',
						link: '/admin/json'
					},
					{
						icon: 'mdi-notebook-outline',
						text: 'Blog',
						link: '/admin/blog',
						setting: 'blogEnabled'
					},
					{
						icon: 'mdi-forum-outline',
						text: 'Forum',
						link: '/admin/forum',
						setting: 'forumEnabled'
					},
					{
						icon: 'mdi-shopping',
						text: 'Shop',
						link: '/admin/shop',
						setting: 'shopEnabled'
					},
					{
						icon: 'mdi-clipboard-list-outline',
						text: 'Todo',
						link: '/admin/todo',
					},
					{
						icon: 'mdi-help-circle',
						text: 'Help',
						link: '/admin/help'
					},
					{
						icon: 'mdi-settings',
						text: 'Settings',
						link: '/admin/settings'
					},
					{
						icon: 'mdi-logout',
						text: 'Logout',
						link: null,
						func: 'logout'
					}
				]
			}
		},
		computed  : {
			settings() {
				return this.$store.state.settingsStore.settings;
			},
			user() {
				return this.$store.state.userStore.user;
			},
			linksCleaned() {
				return this.linksList.filter(item => {
					if (!item.setting) {
						return true
					} else {
						return this.settings[item.setting] == "1";
					}
				});
			}
		},
		methods   : {
			navPage(link) {
				if (link.link != null) {
					this.$router.push(link.link);
				} else if (link.func == 'logout') {
					this.$store.dispatch('userStore/logout');
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
