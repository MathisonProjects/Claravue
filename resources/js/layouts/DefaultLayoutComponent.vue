<template>
	<v-app :style="{ background: vuetifyBackground }">
		<headerComponent />
		<v-content>
			<backgroundImageComponent />
			<v-container fluid>
				<alertComponent />
				<div class='container'>
					<router-view></router-view>
				</div>
			</v-container>
		</v-content>
		<footerComponent />
		<backToTopComponent />
		<landingDialogComponent v-if='landingModal' />
	</v-app>
</template>

<script>
	import footerComponent from '@/layouts/footerComponent';
	import headerComponent from '@/layouts/headerComponent';
	import backToTopComponent from '@/components/backToTopComponent';
	import alertComponent from '@/components/alertComponent';
	import backgroundImageComponent from './backgroundImageComponent';
	import landingDialogComponent from '@/components/landingDialogComponent';

	export default {
		name: 'default-layout-component',
		components: {
			footerComponent,
			headerComponent,
			backToTopComponent,
			alertComponent,
			backgroundImageComponent,
			landingDialogComponent
		},
		props: [],
		data() {
			return {}
		},
		created() { },
		computed: {
			settings() {
				return this.$store.state.settingsStore.settings;
			},
			landingModal() {
				return this.settings.arrivalPopup != null && (this.settings.arrivalPopup.length > 0 && this.settings.arrivalPopup != '');
			},
			vuetifyBackground() {
				if (this.settings.bodyColor === undefined) {
					var type = 'light';
					if (this.$vuetify.isDark) {
						type = 'dark';
					}
					return this.$vuetify.theme.themes[type].background;
				} else {
					return this.settings.bodyColor;
				}
			}
		},
		methods: { }
	};
</script>

<style scoped></style>