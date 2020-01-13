<template>
	<div>
		<addProductComponent :selected='selected' @addRecord='addRecord' @editRecord='editRecord' @deleteRecord='deleteRecord' />
		<listProductsComponent v-model='selected' />
		<productDialogComponent v-if='showModal' @closeDialog='showModal = false' />
	</div>
</template>

<script>
	import addProductComponent from './addProductComponent';
	import listProductsComponent from './listProductsComponent';
	import productDialogComponent from './productDialogComponent';
	export default {
		name      : "shop-products-component",
		props     : [],
		components: {
			addProductComponent,
			listProductsComponent,
			productDialogComponent
		},
		created()   {},
		data()      {
			return {
				selected: [],
				showModal: false
			}
		},
		computed  : {},
		methods   : {
			addRecord() {
				this.showModal = true;
			},
			editRecord() {},
			deleteRecord() {
				for (var i in this.selected) {
					var payload = {
						id: this.selected[i].id
					};
					this.$store.dispatch('shopStore/deleteItems', payload);
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
