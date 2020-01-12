<template>
	<div>
		<v-data-table :headers="headers" :items="productsList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
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
					{ text: 'Product Name', value: 'name' },
					{ text: 'Created At', value: 'created_at' }
				],
				selected: [],
			}
		},
		computed  : {
			productsList() {
				return this.$store.state.shopStore.items;
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
