<template>
	<v-app>
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
			<v-list dense nav v-if='mainMenu.length == 0'>
				<v-list-item link v-for='(link, index) in linksList' :key='index'  @click='navPage(link.link)'>
					<v-list-item-icon><v-icon>{{ link.icon }}</v-icon></v-list-item-icon>
					<v-list-item-content><v-list-item-title>{{ link.text }}</v-list-item-title></v-list-item-content>
				</v-list-item>
			</v-list>
			<v-list dense nav v-if='mainMenu.length != 0'>
				<v-list-item link v-for='(link, index) in mainMenu' :key='index' @click='navPage(link.target)'>
					<v-list-item-icon><v-icon>{{ link.icon }}</v-icon></v-list-item-icon>
					<v-list-item-content><v-list-item-title>{{ link.text }}</v-list-item-title></v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>
		<v-app-bar :clipped-left="primaryDrawer.clipped" app dense>
			<v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent' && $vuetify.breakpoint.xsOnly" @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
			<v-toolbar-title v-if='!settings.name'>{{ app.name }}</v-toolbar-title>
			<v-toolbar-title v-if='settings.name'>{{ settings.name }}</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-toolbar-items v-if="$vuetify.breakpoint.smAndUp">
				<v-btn v-if='mainMenu.length == 0' v-for='(link, index) in linksList' :key='index' text @click='navPage(link.link)'><v-icon>{{ link.icon }}</v-icon> {{ link.text }}</v-btn>
				<v-btn v-if='mainMenu.length > 0' v-for='(link, index) in mainMenu' :key='index' text @click='navPage(link.target)'><v-icon>{{ link.icon }}</v-icon> {{ link.text }}</v-btn>
			</v-toolbar-items>
		</v-app-bar>
		<v-content>
			<v-container fluid>
				<alertComponent />

				<div class='container'>
					<div class='row' v-if='!loggedIn'>
						<div class='col-xs-12 col-md-6'>
							<v-card class="mx-auto">
								<v-card-text>
									<h3>Register</h3>
									<registerComponent />
								</v-card-text>
							</v-card>
						</div>
						<div class='col-xs-12 col-md-6'>
							<v-card class="mx-auto">
								<v-card-text v-if='!forgotAccount'>
									<h3>Login</h3>
									<loginComponent />
									<a href='javascript:void(0)' @click='forgotAccount = true'>I forgot my password...</a>
								</v-card-text>
								<v-card-text v-if='forgotAccount'>
									<h3>Forgot Password</h3>
									<forgotPasswordComponent />
									<a href='javascript:void(0)' @click='forgotAccount = false'>I remember my password!</a>

								</v-card-text>
							</v-card>
						</div>
					</div>
					<div v-if='loggedIn'>
						<router-view></router-view>
					</div>
				</div>
			</v-container>
		</v-content>
		<backToTopComponent />
	</v-app>
</template>

<script>
	import backToTopComponent from '@/components/backToTopComponent';
	import alertComponent from '@/components/alertComponent';

	export default {
		name: 'default-layout-component',
		components: {
			backToTopComponent,
			alertComponent
		},
		props: [],
		data() {
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
				}
			}
		},
		created() { },
		computed: {
			loggedIn() {
				return this.$store.getters['userStore/loggedIn'];
			},
			notifications() {
				if (this.loggedIn) {
					return {
						general: this.$store.state.notificationsStore.general,
						personal: []
					}
				} else {
					return null;
				}
			},
			settings() {
				return this.$store.state.settingsStore.settings;
			},
			linksList() {
				if (this.loggedIn) {
					return [
						{
							icon: 'mdi-home',
							text: 'Home',
							link: '/'
						},
						{
							icon: 'mdi-pencil',
							text: 'Stylesheet',
							link: '/stylesheet'
						}
					];
				} else {
					return [
						{
							icon: 'mdi-home',
							text: 'Home',
							link: '/'
						}
					]
				}
			}
		},
		methods: {
			navPage(page) {
				this.$router.push(page);
			}
		}
	};
</script>

<style scoped></style>