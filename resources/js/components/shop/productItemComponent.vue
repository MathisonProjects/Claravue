<template>
	<v-card class="mx-auto">
		<v-card-text>
			<h5>{{ product.name }}</h5>
			<img :src='imageUrl' class='w-100' />
			<p>{{ product.short_description }}</p>
			<button type='button' class='btn btn-primary btn-sm' @click='addProduct'><i class='fas fa-shopping-cart'></i> ${{ product.amount }}</button>
			<button type='button' class='btn btn-primary btn-sm' @click='viewProduct'><i class='fas fa-search'></i> View</button>
		</v-card-text>
	</v-card>
</template>

<script>
	export default {
		name      : "product-item-component",
		props     : [
			'product'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			imageUrl() {
				return '/upload/' + this.product.meta.images[0];
			}
		},
		methods   : {
			addProduct() {},
			viewProduct() {
				this.$router.push('/shop/' + this.product.id);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
