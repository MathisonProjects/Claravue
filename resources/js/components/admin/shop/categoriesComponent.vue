<template>
	<div>
		<div class='row'>
			<div class='col text-right'>
				<button type='button' class='btn btn-danger' v-if='selected.length > 0'><i class='fas fa-trash'></i> Delete</button>
				<button type='button' class='btn btn-primary' @click='addCategory = true'><i class='fas fa-plus'></i> Add Category</button>
			</div>
		</div>

		<v-data-table :headers="headers" :items="categoriesList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>

		<categoryDialogComponent v-if='addCategory' @closeDialog='addCategory = false' />
	</div>
</template>

<script>
	import categoryDialogComponent from './categoryDialogComponent';
	export default {
		name      : "shop-categories-component",
		props     : [],
		components: {
			categoryDialogComponent
		},
		created()   {},
		data()      {
			return {
				addCategory: false,
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Category', value: 'name' },
					{ text: 'Created At', value: 'created_at' }
				],
				selected: [],
				data: {
					name: null
				}
			}
		},
		computed  : {
			categoriesList() {
				return this.$store.state.shopStore.categories;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
