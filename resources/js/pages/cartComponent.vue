<template>
	<div>
		<h1><v-icon large>mdi-cart</v-icon> Cart - {{ cartTotal }} Items</h1>

		<v-card class="mx-auto">
			<v-card-text>
				<div class='row' v-if='cartTotal > 0'>
					<div class='col-md-6'>
						Grand Total: ${{ totalPrice }}
					</div>
					<div class='col-md-6 text-right'>
						<button type='button' class='btn btn-primary' @click='checkout'><i class='fas fa-trash'></i> Checkout</button>
						<button type='button' class='btn btn-danger' @click='emptyCart'><i class='fas fa-trash'></i> Empty Cart</button>
					</div>
				</div>
				<div class='row' v-if='cartTotal === 0'>
					<div class='col-md-12 overline text-center'>You have no products in your cart!</div>
				</div>
				<div class='row' v-if='cartTotal > 0'>
					<div class='col-md-2'>Image</div>
					<div class='col-md-6'>Item</div>
					<div class='col-md-3'>Price</div>
					<div class='col-md-1'></div>
				</div>
				<div class='row' v-if='cartTotal > 0 && item !== null' v-for='(item, index) in cart'>
					<div class='col-md-2'><img :src='imageFormat(item.meta.images[0])' class='w-100' /></div>
					<div class='col-md-6'><a :href='formatLink(item.id)' target='_BLANK'>{{ item.name }}</a></div>
					<div class='col-md-3'>{{ item.amount }}</div>
					<div class='col-md-1'><a href='javascript:void(0)' class='text-danger' @click='removeItem(index)' title='Remove Item'><i class="fas fa-trash"></i></a></div>
				</div>

			</v-card-text>
		</v-card>
	</div>
</template>

<script>
	export default {
		name      : "cart-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			cart() {
				return this.$store.state.cartStore.cart;
			},
			cartTotal() {
				return this.$store.getters['cartStore/totalItems'];
			},
			totalPrice() {
				return this.$store.getters['cartStore/totalPrice'];
			}
		},
		methods   : {
			formatLink(id) {
				return '/shop/' + id;
			},
			imageFormat(image) {
				return '/upload/' + image;
			},
			checkout() {
				this.$router.push('/checkout');
			},
			emptyCart() {
				this.$store.dispatch('cartStore/emptyCart');
				this.$Helper.alertHelper.emptiedCart();
			},
			removeItem(index) {
				this.$store.dispatch('cartStore/removeFromCart', index);
				this.$Helper.alertHelper.removedFromCart();
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
