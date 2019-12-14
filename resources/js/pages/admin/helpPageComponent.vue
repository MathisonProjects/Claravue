<template>
	<div>
		<h1><v-icon x-large>mdi-help-circle</v-icon> Help</h1>

		<accordionComponent :records='data' />
	</div>
</template>

<script>
	import accordionComponent from '@/components/accordionComponent'
	export default {
		name      : "help-page-component",
		props     : [],
		components: {
			accordionComponent
		},
		created()   {},
		data()      {
			return {
				data: [
					{
						title: 'What technology was used to build this application?',
						text: 'Laravel and VueJs with Vuetify. Laravel is an MVC PHP framework and VueJs is a javascript framework with Vuetify being an addon to VueJs, making it more robust than it already is.'
					}
				]
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
