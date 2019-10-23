<template>
	<v-app>
		<headerComponent />

		<v-container fluid>
			<div class='container'>
				<router-view></router-view>
			</div>
		</v-container>
		<footerComponent />
	</v-app>
</template>

<script>
	import footerComponent from '@/layouts/footerComponent'
	import headerComponent from '@/layouts/headerComponent'
	export default {
		name: 'default-layout-component',
		components: {
			footerComponent,
			headerComponent
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