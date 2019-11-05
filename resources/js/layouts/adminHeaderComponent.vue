<template>
	<div>
		<v-navigation-drawer v-model="primaryDrawer.model" temporary app overflow :mini-variant.sync='miniDrawer'>
			<v-list-item dense>
				<v-list-item-icon><v-icon>fab fa-dev</v-icon></v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title class="title">{{ app.name}}</v-list-item-title>
					<v-list-item-subtitle>{{ app.desc }}</v-list-item-subtitle>
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
					<v-list-item-title class="title">Jacob Mathison</v-list-item-title>
					<v-list-item-subtitle><v-icon>mdi-account-edit</v-icon> <v-icon>mdi-settings</v-icon></v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			
			<v-divider></v-divider>
			<v-list dense nav>
				<v-list-item link v-for='(link, index) in linksList' :key='index'  @click='navPage(link.link)'>
					<v-list-item-icon><v-icon>{{ link.icon }}</v-icon></v-list-item-icon>
					<v-list-item-content><v-list-item-title>{{ link.text }}</v-list-item-title></v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>

		<v-app-bar :clipped-left="primaryDrawer.clipped" app dense>
			<v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent'" @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
			<v-toolbar-title>{{ app.name}}</v-toolbar-title>
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
						icon: 'mdi-material-design',
						text: 'Icons',
						link: '/admin/icons'
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
						link: null
					}
				]
			}
		},
		computed  : {},
		methods   : {
			navPage(page) {
				this.$router.push(page);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
