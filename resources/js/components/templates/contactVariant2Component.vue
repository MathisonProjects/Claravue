<template>
	<div>
		<contactFormComponent @messageCallback='messageCallback' />
	</div>
</template>

<script>
	import contactFormComponent from '@/components/contactFormComponent'
	export default {
		name      : "contact-variant-2-component",
		props     : [],
		components: {
			contactFormComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {
			messageCallback(data) {
				console.log(data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
