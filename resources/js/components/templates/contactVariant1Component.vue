<template>
	<div>
		<contactFormComponent :reasons='reasons' />
	</div>
</template>

<script>
	import contactFormComponent from '@/components/contactFormComponent'
	export default {
		name      : "contact-variant-1-component",
		props     : [
			'params'
		],
		components: {
			contactFormComponent
		},
		created()   {},
		data()      { return {} },
		computed  : {
			data() {
				return JSON.parse(this.params.data);
			},
			reasons() {
				return this.data.reasons;
			}
		},
		methods   : {
			messageCallback(data) {
				console.log(data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
