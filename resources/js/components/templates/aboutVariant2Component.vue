<template>
	<div>
		<h1>{{ params.title }}</h1>
		<div class='row'>
			<div class='col-xs-12 col-md-9' v-html='params.text'></div>
			<div class='col-xs-12 col-md-3'><img :src='params.image' /></div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "about-variant-2-component",
		props     : [
			'params'
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
