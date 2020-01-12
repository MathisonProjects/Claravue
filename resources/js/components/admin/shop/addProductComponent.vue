<template>
	<div>
		<div class='row'>
			<div class='col text-right'>
				<button type='button' class='btn btn-danger' v-if='selected.length > 0' @click='deleteRecord'><i class='fas fa-minus'></i> Delete Product</button>
				<button type='button' class='btn btn-warning' v-if='selected.length > 0' @click='editRecord'><i class='fas fa-edit'></i> Edit Product</button>
				<button type='button' class='btn btn-primary' @click='addRecord'><i class='fas fa-plus'></i> Add Product</button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "add-product-component",
		props     : [
			'selected'
		],
		components: {},
		created()   {},
		data()      {
			return {}
		},
		computed  : {},
		methods   : {
			deleteRecord() {
				this.$emit('deleteRecord');
			},
			editRecord() {
				this.$emit('editRecord');
			},
			addRecord() {
				this.$emit('addRecord');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
