<template>
	<div>
		<h1>{{ header }}</h1>
		<p class='overline'>Created At: {{ params.created_at }}</p>
		<img :src='data.image' class='w-100' />
		<div v-html='data.content'></div>
	</div>
</template>

<script>
	export default {
		name      : "content-variant-2-component",
		props     : [
			'params'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			header() {
				return this.data.header;
			},
			content() {
				return this.data.content;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
