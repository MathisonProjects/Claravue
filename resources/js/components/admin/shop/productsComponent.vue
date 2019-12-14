<template>
	<div>
		<addProductComponent v-if='section == "add"' />
		<listProductsComponent v-if='section == "list"' />
	</div>
</template>

<script>
	import addProductComponent from './addProductComponent';
	import listProductsComponent from './listProductsComponent';
	export default {
		name      : "shop-products-component",
		props     : [],
		components: {
			addProductComponent,
			listProductsComponent
		},
		created()   {},
		data()      {
			return {
				section: 'list'
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
