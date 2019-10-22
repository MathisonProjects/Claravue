<template>
	<div>
		<v-toolbar dense>
			<v-toolbar-title>Vue Laravel Clean</v-toolbar-title>

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
		</v-toolbar>

		<div class='container'>
			<router-view></router-view>
		</div>

		<footerComponent />
	</div>
</template>

<script>
	import footerComponent from '@/layouts/footerComponent'
	export default {
		name: 'default-layout-component',
		components: {
			footerComponent
		},
		props: [],
		data() {
			return {}
		},
		created() { },
		computed: { },
		methods: {
			navPage(page) {
				this.$router.push(page);
			}
		}
	};
</script>

<style scoped>
	.footer {
		position: fixed;
		bottom: 0;
		width: 100%;
		/* Set the fixed height of the footer here */
		height: 60px;
		line-height: 60px; /* Vertically center the text there */
	}
</style>