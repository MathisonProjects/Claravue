<template>
	<div>
		<h1><i class="far fa-credit-card"></i> Checkout</h1>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						<h5><i class="fas fa-shopping-cart"></i> Cart</h5>
						<div class='row'>
							<div class='col-md-6'>
								{{ cartTotal }} Items
							</div>
							<div class='col-md-6 text-right'>
								<b>Subtotal</b> ${{ totalPrice }}
							</div>
						</div>

						<div class='row' v-for='(item, index) in cart'>
							<div class='col-md-6'>{{ item.name }}</div>
							<div class='col-md-6 text-right'>${{ item.amount }}</div>
						</div>
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						<h5><i class="fas fa-address-card"></i> Billing</h5>
					</v-card-text>
				</v-card>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "checkout-component",
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
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
