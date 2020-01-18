<template>
	<div class='overline'>
		{{ address.first }} {{ address.last }}<br />
		{{ address.street }} {{ address.apt }} <br />
		{{ address.city }} {{ address.state }}, {{ address.zip }} <br />
		{{ address.phone }}<br />
		{{ address.email }} 
	</div>
</template>

<script>
	export default {
		name      : "address-format-component",
		props     : [
			'address'
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
