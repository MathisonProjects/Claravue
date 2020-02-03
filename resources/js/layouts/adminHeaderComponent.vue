<template>
	<div>
		<v-navigation-drawer v-model="primaryDrawer.model" temporary app overflow :mini-variant.sync='miniDrawer'>
			<v-list-item dense>
				<v-list-item-icon><v-icon>fab fa-dev</v-icon></v-list-item-icon>
				<v-list-item-content>
					<v-list-item-title class="title">
						<v-btn text @click='navPage("/admin")'>{{ app.name }}</v-btn>
					</v-list-item-title>
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
					<v-list-item-title class="title">{{ user.name }}</v-list-item-title>
					<v-list-item-subtitle>
						<v-btn text icon color="blue" @click='$router.push("/admin/settings")'><v-icon>mdi-account-edit</v-icon></v-btn>
						<v-btn text icon color="blue" @click='$router.push("/admin/settings")'><v-icon>mdi-settings</v-icon></v-btn>
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			
			<v-divider></v-divider>
			<v-list dense nav class='displayContainer'>
				<v-list-item link v-for='(link, index) in linksCleaned' :key='index'  @click='navPage(link)'>
					<v-list-item-icon><v-icon>{{ link.icon }}</v-icon></v-list-item-icon>
					<v-list-item-content><v-list-item-title>{{ link.text }}</v-list-item-title></v-list-item-content>
				</v-list-item>
			</v-list>
		</v-navigation-drawer>

		<v-app-bar :clipped-left="primaryDrawer.clipped" app dense>
			<v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent'" @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
			<v-toolbar-title>
				<img :src='brandingImage' class='brandMenu' />
				<v-btn text @click='navPage(linksList[0])'>{{ app.name }}</v-btn>
			</v-toolbar-title>
		</v-app-bar>
	</div>
</template>

<script>
	import { DefaultValues } from '@/enum';

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
			}
		},
		computed  : {
			linksList() {
				return this.$store.state.jsonStore.linkList.adminLinks;
			},
			app() {
				return {
					name: (this.settings.name !== undefined) ? this.settings.name : DefaultValues.APP_NAME,
					desc: (this.settings.name !== undefined) ? this.settings.description : DefaultValues.APP_DESC
				}
			},
			brandingImage() {
				if (this.settings.titleBranding !== undefined) {
					return this.$Helper.formatHelper.formatUpload(this.settings.titleBranding);
				} else {
					return '/images/logo_claravue.png'
				}
			},
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

<style scoped>
	.brandMenu {
		height: 45px;
	}
	.displayContainer {
		height: calc(100% - 206px);
		overflow-y: scroll;
	}

	.displayContainer::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	.displayContainer::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	.displayContainer::-webkit-scrollbar-thumb {
	  background: #888; 
	}

	/* Handle on hover */
	.displayContainer::-webkit-scrollbar-thumb:hover {
	  background: #555; 
	}
</style>
