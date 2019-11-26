<template>
	<div>
		Add/Delete Cat

		<div class='row'>
			<div class='col'>
				<div class='form-group'>
					<label for='catName'>Category Name</label>
					<input type='text' id='catName' class='form-control' v-model='data.name' />
				</div>
				<div class='form-group text-right'>
					<button type='button' class='btn btn-primary' @click='saveCat'><i class='fas fa-save'></i> Save Category</button>
				</div>
			</div>
		</div>

		<v-data-table :headers="headers" :items="categoriesList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "shop-categories-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Category', value: 'name' },
					{ text: 'Total Products', value: 'total' },
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
				return []
			}
		},
		methods   : {
			// Save all the cats <3
			saveCat() {
				this.reset();
			},
			// You monster...
			deleteCat() {

			},
			reset() {
				this.data.name = null;
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
