<template>
	<div>
		<aboutVariant1Component v-if='type == "about1"' :params='params' />
		<aboutVariant2Component v-if='type == "about2"' :params='params' />
		<contentVariant1Component v-if='type == "content1"' :params='params' />
		<contentVariant2Component v-if='type == "content2"' :params='params' />
		<homeVariant1Component v-if='type == "home1"' :params='params' />
		<homeVariant2Component v-if='type == "home2"' :params='params' />
	</div>
</template>

<script>
	import aboutVariant1Component from './aboutVariant1Component';
	import aboutVariant2Component from './aboutVariant2Component';
	import contentVariant1Component from './contentVariant1Component';
	import contentVariant2Component from './contentVariant2Component';
	import homeVariant1Component from './homeVariant1Component';
	import homeVariant2Component from './homeVariant2Component';

	export default {
		name      : "template-filter-component",
		props     : [
			'type',
			'params'
		],
		components: {
			aboutVariant1Component,
			aboutVariant2Component,
			contentVariant1Component,
			contentVariant2Component,
			homeVariant1Component,
			homeVariant2Component
		},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
