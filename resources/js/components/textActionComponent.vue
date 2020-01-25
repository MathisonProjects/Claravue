<template>
	<div class='row'>
		<div class='col-xs-12 col-sm-6 col-md-8' v-html='description'></div>
		<div class='col-xs-12 col-sm-6 col-md-4'>
			<button type='button' class='btn btn-primary' @click='$router.push(action)'>{{ actionText }}</button>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "text-action-component",
		props     : [
			'description',
			'action',
			'actionText'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
