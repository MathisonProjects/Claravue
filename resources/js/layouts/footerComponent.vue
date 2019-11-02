<template>
	<v-footer dark padless fixed app>
		<v-card class="flex" flat tile>
			<v-card-title class="dark">
				<strong class="subheading">Get connected with us on social networks!</strong>

				<v-spacer></v-spacer>

				<v-btn v-for="(icon, index) in icons" :key="index" target='_BLANK' :href='icon.url' class="mx-4" dark icon>
					<v-icon size="24px">{{ icon.icon }}</v-icon>
				</v-btn>
			</v-card-title>

			<v-card-text class="py-2 white--text text-center">
				{{ new Date().getFullYear() }} — <strong><a href='https://mathisonprojects.com' target='_BLANK'>Mathison Projects</a> | <a href='https://github.com/Divinityfound/vue-laravel-cleandeploy' target='_BLANK'>Vue Laravel Clean</a></strong>
			</v-card-text>
		</v-card>
	</v-footer>
</template>
<script>
	export default {
		name      : "footer-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {}
		},
		computed  : {
			icons() {
				return this.$store.state.jsonStore.staticLists.footerIcons;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
