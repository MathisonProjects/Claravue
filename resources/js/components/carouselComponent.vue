<template>
	<v-carousel  height="auto" cycle>
		<v-carousel-item v-for="(item, index) in carouselItems" :key="index" :src='item.src'>
		</v-carousel-item>
	</v-carousel>
</template>

<script>
	export default {
		name      : "carousel-component",
		props     : [
			'carouselItems'
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
