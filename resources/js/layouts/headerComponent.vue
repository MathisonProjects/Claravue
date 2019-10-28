<template>
	<div>
		<v-navigation-drawer v-model="primaryDrawer.model" temporary app overflow>
			<v-list-item>
				<v-list-item-content>
					<v-list-item-title class="title">
						Mathison Projects
					</v-list-item-title>
					<v-list-item-subtitle>
						App Desc
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-divider></v-divider>
			<v-list dense nav>
				<v-list-item link>
					<v-list-item-icon>
						<v-icon>mdi-home</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title>Home</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				<v-list-item link>
					<v-list-item-icon>
						<v-icon>mdi-pencil</v-icon>
					</v-list-item-icon>
					<v-list-item-content>
						<v-list-item-title>Stylesheet</v-list-item-title>
					</v-list-item-content>
				</v-list-item>
				
			</v-list>
		</v-navigation-drawer>

		<v-app-bar :clipped-left="primaryDrawer.clipped" app>
			<v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent'" @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
			<v-toolbar-title>Mathison Projects</v-toolbar-title>

			<v-spacer></v-spacer>
			<v-toolbar-items>
				<v-btn text @click='navPage("/")'><v-icon>mdi-home</v-icon> Home</v-btn>
				<v-btn text @click='navPage("/stylesheet")'><v-icon>mdi-pencil</v-icon> Stylesheet</v-btn>
			</v-toolbar-items>
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
