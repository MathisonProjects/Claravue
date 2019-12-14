<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2' v-for='(image, index) in data.images' :key='index'>
				<img :src='imageLink(image)' class='w-100' />
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "gallery-variant-1-component",
		props     : [
			'params'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			}
		},
		methods   : {
			imageLink(image) {
				return '/upload/' + image;
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
