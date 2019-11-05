<template>
	<v-app>
		<adminHeaderComponent />
		<v-content>
			<v-container fluid>
				<div class='container'>
					<router-view></router-view>
				</div>
			</v-container>
		</v-content>
		<footerComponent />
	</v-app>
</template>

<script>
	import footerComponent from '@/layouts/footerComponent'
	import adminHeaderComponent from '@/layouts/adminHeaderComponent'
	export default {
		name: 'admin-layout-component',
		components: {
			footerComponent,
			adminHeaderComponent
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