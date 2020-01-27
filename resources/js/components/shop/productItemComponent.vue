<template>
	<v-card class="mx-auto">
		<v-card-text>
			<h5>{{ product.name }}</h5>
			<img :src='imageUrl' class='w-100' />
			<p>{{ product.short_description }}</p>
			<button type='button' class='btn btn-primary btn-sm' @click='addProduct' v-if='!added'><i class='fas fa-shopping-cart'></i> ${{ $Helper.formatHelper.formatCurrency(product.amount) }}</button>
			<button type='button' class='btn btn-success btn-sm' @click='addProduct' v-if='added'><i class='fas fa-shopping-cart'></i> Put in Cart</button>
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
		data()      {
			return {
				added: false
			}
		},
		computed  : {
			imageUrl() {
				return '/upload/' + this.product.meta.images[0];
			}
		},
		methods   : {
			addProduct() {
				this.$store.dispatch('cartStore/addToCart', this.product);
				this.$Helper.alertHelper.addedToCart();
				this.added = true;
			},
			viewProduct() {
				this.$router.push('/shop/' + this.product.id);
			}
		},
		watch     : {
			added(newVal) {
				if (newVal == true) {
					setTimeout( () => { this.added = false }, 3000)
				}
			}
		}
	};
</script>

<style scoped></style>
