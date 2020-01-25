<template>
	<div>
		<carouselComponent :carouselItems='carouselItems' />
		<textActionComponent :description='data.description' :action='data.url' :actionText='data.actionText' />
	</div>
</template>

<script>
	import carouselComponent from '@/components/carouselComponent';
	import textActionComponent from '@/components/textActionComponent';
	export default {
		name      : "home-variant-4-component",
		props     : [
			'params'
		],
		components: {
			carouselComponent,
			textActionComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			content() {
				return this.data.content;
			},
			carouselItems() {
				return [];
			}
		},
		methods   : {
		},
		watch     : {}
	};
</script>

<style scoped></style>
