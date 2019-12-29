<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'><h1><v-icon x-large>mdi-json</v-icon> JSON Records</h1></div>
			<div class='col-xs-12col-md-6'></div>
		</div>
		<listComponent />
		<setComponent />
	</div>
</template>

<script>
	import listComponent from '@/components/admin/json/listComponent';
	import setComponent from '@/components/admin/json/setComponent';
	export default {
		name      : "json-page-component",
		props     : [],
		components: {
			listComponent,
			setComponent
		},
		created()   {},
		data()      {
			return {

			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
