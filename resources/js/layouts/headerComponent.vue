<template>
	<div>
		<v-navigation-drawer v-model="primaryDrawer.model" temporary app overflow></v-navigation-drawer>

		<v-app-bar :clipped-left="primaryDrawer.clipped" app>
			<v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent'" @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
			<v-toolbar-title>Vuetify</v-toolbar-title>

			<v-spacer></v-spacer>
			<v-toolbar-items>
				<v-btn text>Link 1</v-btn>
				<v-btn text>Link 2</v-btn>
				<v-btn text>Link 3</v-btn>
			</v-toolbar-items>

			<template v-if="$vuetify.breakpoint.smAndUp">
				<v-btn icon>
					<v-icon>home</v-icon>
				</v-btn>
				<v-btn icon>
					<v-icon>lock_open</v-icon>
				</v-btn>
				<v-btn icon>
					<v-icon>lock_open</v-icon>
				</v-btn>
			</template>
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
