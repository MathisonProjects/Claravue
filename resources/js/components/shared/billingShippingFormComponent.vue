<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				
			</div>
			<div class='col-xs-12 col-md-6'>
				
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'></div>
			<div class='col-xs-12 col-md-6'></div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'></div>
			<div class='col-xs-12 col-md-6'></div>
			<div class='col-xs-12 col-md-6'></div>
		</div>

		First Last
		Street Apt
		Street City Zip
	</div>
</template>

<script>
	export default {
		name      : "billing-shipping-form-component",
		props     : [],
		model: {
			event: 'updateModel'
		},
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					first: null,
					last: null,
					street: null,
					apt: null,
					city: null,
					state: null,
					zip: null
				}
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
