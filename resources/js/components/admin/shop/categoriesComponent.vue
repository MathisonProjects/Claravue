<template>
	<div>
		<div class='row'>
			<div class='col text-right'>
				<button type='button' class='btn btn-danger' v-if='selected.length > 0'><i class='fas fa-trash'></i> Delete</button>
				<button type='button' class='btn btn-primary' v-if='!addCategory' @click='addCategory = true'><i class='fas fa-plus'></i> Add Category</button>
				<button type='button' class='btn btn-warning' v-if='addCategory' @click='addCategory = false'><i class='fas fa-minus'></i> Close Adding Category</button>
			</div>
		</div>
		<div class='row' v-if='addCategory'>
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
				addCategory: false,
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
