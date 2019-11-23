<template>
	<div>
		<div v-if='page == null'>
			<h1>Welcome Home</h1>
			<p>You are ready to start making your site!!</p>
		</div>
		<templateFilterComponent :type='page.type' :params='page' v-if='page != null' />
	</div>
</template>

<script>
	import templateFilterComponent from '@/components/templates/templateFilterComponent'
	export default {
		name: 'home-component',
		components: {
			templateFilterComponent
		},
		props: [],
		data() {
			return {}
		},
		computed: {
			page() {
				return this.$store.getters['pageStore/home'];
			}
		},
		methods: {}
	};
</script>

<style scoped>
</style>
