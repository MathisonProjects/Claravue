<template>
	<v-footer dark padless fixed app>
		<v-card class="flex" flat tile>
			<v-card-title class="dark">
				<strong class="subheading" v-if='settingsFooter.footerTagline == null'>Get connected with us on social networks!</strong>
				<strong class="subheading" v-if='settingsFooter.footerTagline != null'>{{settingsFooter.footerTagline}}</strong>
				<v-spacer></v-spacer>
				<v-btn v-if='!showCustomFooter' v-for="(icon, index) in icons" :key="index" target='_BLANK' :href='icon.url' class="mx-1" dark icon>
					<v-icon size="24px">{{ icon.icon }}</v-icon>
				</v-btn>
				<div v-if='showCustomFooter'>
					<v-btn v-if='settingsFooter.facebook' target='_BLANK' :href='settingsFooter.facebook' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-facebook</v-icon>
					</v-btn>
					<v-btn v-if='settingsFooter.twitter' target='_BLANK' :href='settingsFooter.twitter' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-twitter</v-icon>
					</v-btn>
					<v-btn v-if='settingsFooter.youtube' target='_BLANK' :href='settingsFooter.youtube' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-youtube</v-icon>
					</v-btn>
					<v-btn v-if='settingsFooter.linkedin' target='_BLANK' :href='settingsFooter.linkedin' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-linkedin</v-icon>
					</v-btn>
					<v-btn v-if='settingsFooter.instagram' target='_BLANK' :href='settingsFooter.instagram' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-instagram</v-icon>
					</v-btn>
					<v-btn v-if='settingsFooter.github' target='_BLANK' :href='settingsFooter.github' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-github</v-icon>
					</v-btn>
					<v-btn v-if='settingsFooter.pinterest' target='_BLANK' :href='settingsFooter.pinterest' class="mx-1" dark icon>
						<v-icon size="24px">fab fa-pinterest</v-icon>
					</v-btn>
				</div>
			</v-card-title>

			<v-card-text class="py-2 white--text text-center">
				{{ new Date().getFullYear() }} — <strong>
					<a href='https://mathisonprojects.com' target='_BLANK' v-if='settingsFooter.footerCompanyName == null'>Mathison Projects</a>
					<a :href='settingsFooter.footerCompanyLink' target='_BLANK' v-if='settingsFooter.footerCompanyName != null'>{{settingsFooter.footerCompanyName}}</a>
					|
					<a href='https://github.com/Divinityfound/vue-laravel-cleandeploy' target='_BLANK' v-if='settingsFooter.footerCompanyApp == null'>Vue Laravel Clean</a></strong>
					<a :href='settingsFooter.footerCompanyAppLink' target='_BLANK' v-if='settingsFooter.footerCompanyApp != null'>{{settingsFooter.footerCompanyApp}}</a></strong>
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
			},
			settingsFooter() {
				return this.$store.state.settingsStore.settings;	
			},
			showCustomFooter() {
				if (
					this.settingsFooter.facebook != null ||
					this.settingsFooter.twitter != null ||
					this.settingsFooter.youtube != null ||
					this.settingsFooter.linkedin != null ||
					this.settingsFooter.instagram != null ||
					this.settingsFooter.github != null ||
					this.settingsFooter.pinterest != null) {
					return true;
				} else {
					return false;
				}
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
