<template>
	<div>
		<templateFilterComponent :type='page.type' :params='page' />
	</div>
</template>

<script>
	import templateFilterComponent from '@/components/templates/templateFilterComponent'
	export default {
		name      : "page-component",
		props     : [],
		components: {
			templateFilterComponent
		},
		created()   {},
		data()      {
			return {}
		},
		computed  : {
			pages() {
				return this.$store.state.pageStore.pages;
			},
			page() {
				var key = this.$route.params.key;
				if (this.pages.length > 0) {
					return this.pages.filter(page => {
						return page.key == key;
					})[0];
				}
				return null;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
