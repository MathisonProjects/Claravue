<template>
	<div>
		<h1>{{ header }}</h1>
		<p class='overline'>Created At: {{ params.created_at }}</p>
		<img :src='imageLink' class='w-100' />
		<div class='mt-2' v-html='data.content'></div>

		<div class='row'>
			<div class='col-xs-12 col-sm-6 col-md-3'>
				<img :src='data.authorPic' class='w-100' />
			</div>
			<div class='col-xs-12 col-sm-6 col-md-9'>
				{{ data.author_name }}<br />
				{{ data.author_description }}
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "news-article-variant-1-component",
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
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
