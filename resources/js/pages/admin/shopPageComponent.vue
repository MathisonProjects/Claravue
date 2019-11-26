<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-3'>
				<h1><v-icon x-large>mdi-shopping</v-icon> Shop</h1>
			</div>
			<div class='col-xs-12 col-md-9'>
				<div class='row'>
					<div class='col-xs-12 col-md-4 text-center'><button type='button' class='btn btn-primary' @click='section = "cat"'><i class='fas fa-list'></i> Categories</button></div>
					<div class='col-xs-12 col-md-4 text-center'><button type='button' class='btn btn-primary' @click='section = "pro"'><i class='fas fa-shopping-basket'></i> Product Entry</button></div>
					<div class='col-xs-12 col-md-4 text-center'><button type='button' class='btn btn-primary' @click='section = "tra"'><i class='far fa-money-bill-alt'></i> Transactions</button></div>
				</div>
			</div>
		</div>

		<v-card class="mx-auto" v-if='section == null'>
			<v-card-text>How would you like to manage your shop?</v-card-text>
		</v-card>
		<categoriesComponent v-if='section == "cat"' />
		<productsComponent v-if='section == "pro"' />
		<transactionsComponent v-if='section == "tra"' />
	</div>
</template>

<script>
	import categoriesComponent from '@/components/admin/shop/categoriesComponent';
	import productsComponent from '@/components/admin/shop/productsComponent';
	import transactionsComponent from '@/components/admin/shop/transactionsComponent';
	export default {
		name      : "shop-page-component",
		props     : [],
		components: {
			categoriesComponent,
			productsComponent,
			transactionsComponent
		},
		created()   {},
		data()      {
			return {
				section: null
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
