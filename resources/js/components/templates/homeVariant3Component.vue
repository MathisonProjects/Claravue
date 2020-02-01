<template>
	<div class='row'>
		<div class='col-xs-12 col-sm-6 col-md-6 col-md-4'>
			<v-card class="mx-auto">
				<v-card-text v-html='content'></v-card-text>
			</v-card>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "home-variant-3-component",
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
			content() {
				return this.data.content;
			}
		},
		methods   : {
		},
		watch     : {}
	};
</script>

<style scoped></style>
