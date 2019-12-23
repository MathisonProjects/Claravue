<template>
	<v-app>
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
	</v-app>
</template>

<script>
	import footerComponent from '@/layouts/footerComponent';
	import headerComponent from '@/layouts/headerComponent';
	import backToTopComponent from '@/components/backToTopComponent';
	import alertComponent from '@/components/alertComponent';
	import backgroundImageComponent from './backgroundImageComponent';

	export default {
		name: 'default-layout-component',
		components: {
			footerComponent,
			headerComponent,
			backToTopComponent,
			alertComponent,
			backgroundImageComponent
		},
		props: [],
		data() {
			return {}
		},
		created() { },
		computed: { },
		methods: { }
	};
</script>

<style scoped></style>