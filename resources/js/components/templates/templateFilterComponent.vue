<template>
	<div>
		<aboutVariant1Component v-if='type == "about1"' :params='params' />
		<aboutVariant2Component v-if='type == "about2"' :params='params' />
		<accordionVariantComponent v-if='type == "accordion"' :params='params' />
		<contentVariant1Component v-if='type == "content1"' :params='params' />
		<contentVariant2Component v-if='type == "content2"' :params='params' />
		<galleryVariant1Component v-if='type == "gallery1"' :params='params' />
		<galleryVariant2Component v-if='type == "gallery2"' :params='params' />
		<homeVariant1Component v-if='type == "home1"' :params='params' />
		<homeVariant2Component v-if='type == "home2"' :params='params' />
		<newsArticleVariant1Component v-if='type == "news1"' :params='params' />
		<newsArticleVariant2Component v-if='type == "news2"' :params='params' />
	</div>
</template>

<script>
	import aboutVariant1Component from './aboutVariant1Component';
	import aboutVariant2Component from './aboutVariant2Component';
	import accordionVariantComponent from './accordionVariantComponent';
	import contentVariant1Component from './contentVariant1Component';
	import contentVariant2Component from './contentVariant2Component';
	import galleryVariant1Component from './galleryVariant1Component';
	import galleryVariant2Component from './galleryVariant2Component';
	import homeVariant1Component from './homeVariant1Component';
	import homeVariant2Component from './homeVariant2Component';
	import newsArticleVariant1Component from './newsArticleVariant1Component';
	import newsArticleVariant2Component from './newsArticleVariant2Component';

	export default {
		name      : "template-filter-component",
		props     : [
			'type',
			'params'
		],
		components: {
			aboutVariant1Component,
			aboutVariant2Component,
			accordionVariantComponent,
			contentVariant1Component,
			contentVariant2Component,
			galleryVariant1Component,
			galleryVariant2Component,
			homeVariant1Component,
			homeVariant2Component,
			newsArticleVariant1Component,
			newsArticleVariant2Component
		},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
