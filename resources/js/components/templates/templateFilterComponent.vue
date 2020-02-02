<template>
	<div>
		<aboutVariant1Component v-if='type == "about1"' :params='params' />
		<aboutVariant2Component v-if='type == "about2"' :params='params' />
		<accordionVariantComponent v-if='type == "accordion"' :params='params' />
		<accordionVariant2Component v-if='type == "accordion2"' :params='params' />
		<contactVariant1Component v-if='type == "contact1"' :params='params' />
		<contactVariant2Component v-if='type == "contact2"' :params='params' />
		<contentVariant1Component v-if='type == "content1"' :params='params' />
		<contentVariant2Component v-if='type == "content2"' :params='params' />
		<galleryVariant1Component v-if='type == "gallery1"' :params='params' />
		<galleryVariant2Component v-if='type == "gallery2"' :params='params' />
		<homeVariant1Component v-if='type == "home1"' :params='params' />
		<homeVariant2Component v-if='type == "home2"' :params='params' />
		<homeVariant3Component v-if='type == "home3"' :params='params' />
		<newsArticleVariant1Component v-if='type == "news1"' :params='params' />
		<newsArticleVariant2Component v-if='type == "news2"' :params='params' />
		<twitchVariantComponent v-if='type == "twitch"' :params='params' />
	</div>
</template>

<script>
	import aboutVariant1Component from './aboutVariant1Component';
	import aboutVariant2Component from './aboutVariant2Component';
	import accordionVariantComponent from './accordionVariantComponent';
	import accordionVariant2Component from './accordionVariant2Component';
	import contactVariant1Component from './contactVariant1Component';
	import contactVariant2Component from './contactVariant2Component';
	import contentVariant1Component from './contentVariant1Component';
	import contentVariant2Component from './contentVariant2Component';
	import galleryVariant1Component from './galleryVariant1Component';
	import galleryVariant2Component from './galleryVariant2Component';
	import homeVariant1Component from './homeVariant1Component';
	import homeVariant2Component from './homeVariant2Component';
	import homeVariant3Component from './homeVariant3Component';
	import newsArticleVariant1Component from './newsArticleVariant1Component';
	import newsArticleVariant2Component from './newsArticleVariant2Component';
	import twitchVariantComponent from './twitchVariantComponent';

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
			accordionVariant2Component,
			contactVariant1Component,
			contactVariant2Component,
			contentVariant1Component,
			contentVariant2Component,
			galleryVariant1Component,
			galleryVariant2Component,
			homeVariant1Component,
			homeVariant2Component,
			homeVariant3Component,
			newsArticleVariant1Component,
			newsArticleVariant2Component,
			twitchVariantComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
