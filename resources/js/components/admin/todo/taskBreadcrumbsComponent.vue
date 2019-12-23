<template>
	<div class='overline'>
		<span v-if='breadcrumbs[0]'><a href='javascript:void(0)' @click='resetNav'>Projects</a></span>
		<span v-if='breadcrumbs[0]'><i class='fas fa-angle-right'></i> <a href='javascript:void(0)' @click='navProj(breadcrumbs[0].id)'>{{ breadcrumbs[0].Name }}</a></span>
		<span v-if='breadcrumbs[1]'><i class='fas fa-angle-double-right'></i> <a href='javascript:void(0)' @click='navCat(breadcrumbs[1].id)'>{{ breadcrumbs[1].Name }}</a></span>
		<span v-if='breadcrumbs[2]'><i class='fas fa-angle-double-right'></i> {{ breadcrumbs[2].Name }}</span>
	</div>
</template>

<script>
	export default {
		name      : "task-breadcrumbs-component",
		props     : [
			'breadcrumbs'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {
			resetNav() {
				this.$emit('resetNav');
			},
			navProj(id) {
				this.$emit('navProj', id);
			},
			navCat(id) {
				this.$emit('navCat', id);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
