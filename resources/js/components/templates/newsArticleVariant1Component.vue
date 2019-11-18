<template>
	<div>
		<h1>{{ header }}</h1>
		<p class='overline'>Created At: {{ params.created_at }}</p>
		<img :src='data.image' class='w-100' />
		<div v-html='data.content'></div>

		<div class='row'>
			<div class='col-xs-12 col-sm-6 col-md-3'>
				<img :src='data.authorPic' class='w-100' />
			</div>
			<div class='col-xs-12 col-sm-6 col-md-9'>
				Name<br />
				Description
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
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
