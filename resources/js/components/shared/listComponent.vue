<template>
	<v-data-table :headers="headers" :items="items" :items-per-page="perPage" v-model='selected' class="elevation-1" dense show-select single-select></v-data-table>
</template>

<script>
	export default {
		name      : "list-component",
		props     : [
			'headers',
			'items',
			'perPage'
		],
		model: {
			event: 'updateSelected'
		},
		components: {},
		created()   {},
		data()      {
			return {
				selected: []
			}
		},
		computed  : {},
		methods   : {},
		watch     : {
			selected(newValue) {
				this.$emit('updateSelected', newValue);
			}
		}
	};
</script>

<style scoped></style>
