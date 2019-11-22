<template>
	<v-app>
		<headerComponent />
		<v-content>
			<v-container fluid>
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

	export default {
		name: 'default-layout-component',
		components: {
			footerComponent,
			headerComponent,
			backToTopComponent
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