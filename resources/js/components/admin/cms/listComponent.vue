<template>
	<div>
		<v-data-table :headers="headers" :items="itemsList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "list-products-component",
		props     : [],
		model: {
			event: 'updateSelected'
		},
		components: {},
		created()   {},
		data()      {
			return {
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Module Name', value: 'name' },
					{ text: 'Total Records', value: 'records' },
					{ text: 'Created At', value: 'created_at' }
				],
				selected: [],
			}
		},
		computed  : {
			itemsList() {
				return this.$store.state.cmsStore.modules;
			}
		},
		methods   : {},
		watch     : {
			selected(newValue) {
				this.$emit('updateSelected', newValue);
			}
		}
	};
</script>

<style scoped></style>
