<template>
	<div>
		<h1>{{ header }}</h1>
		
		<div class='row'>
			<div class='col-xs-12 col-md-3'><img :src='imageLink' class='w-100' /></div>
			<div class='col-xs-12 col-md-9' v-html='data.content'></div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "about-variant-1-component",
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
			},
			imageLink() {
				return '/upload/' + this.data.image;
			}
		},
		methods   : {
		},
		watch     : {}
	};
</script>

<style scoped></style>
