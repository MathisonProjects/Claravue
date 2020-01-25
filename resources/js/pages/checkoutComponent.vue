<template>
	<div>
		<div v-if='cart.length === 0 && step === 0'>
			<v-card class="mx-auto text-center">
				<v-card-text>
					It appears you have no items in your cart! Fill your cart so you can checkout!
				</v-card-text>
			</v-card>
		</div>
		<div v-if='cart.length === 0 && step > 0'>
			<v-card class="mx-auto text-center">
				<v-card-text>
					Thank you for your patronage!
				</v-card-text>
			</v-card>
		</div>
		<div v-if='cart.length > 0'>
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
									<b>Subtotal</b> ${{ $Helper.formatHelper.formatCurrency(totalPrice) }}
								</div>
							</div>

							<div class='row' v-for='(item, index) in cart'>
								<div class='col-md-6'>{{ item.name }}</div>
								<div class='col-md-6 text-right'>${{ $Helper.formatHelper.formatCurrency(item.amount) }}</div>
							</div>
						</v-card-text>
					</v-card>
					<v-card class="mx-auto mt-3" v-if='step > 0'>
						<v-card-text>
							<button type='button' class='btn btn-primary mb-2' @click='step = 0'><i class='fas fa-edit'></i> Edit Billing and Shipping</button>
							<h5>Billing</h5>
							<addressFormatComponent :address='billing' />
							<h5>Shipping</h5>
							<addressFormatComponent :address='shipping' />
						</v-card-text>
					</v-card>

				</div>
				<div class='col-xs-12 col-md-6'>
					<v-card class="mx-auto" v-if='step == 0'>
						<v-card-text>
							<h5><i class="fas fa-address-card"></i> Billing</h5>
							<v-checkbox v-model="shippingAsBilling" label="Shipping same as Billing" dense />

							<billingShippingFormComponent text='Billing' v-model='billing' />
							<billingShippingFormComponent text='Shipping' v-model='shipping' v-if='!shippingAsBilling' />
							<div class='row'>
								<div class='col text-right'><button type='button' class='btn btn-primary' @click='step++'><i class='fas fa-caret-right'></i> Next</button></div>
							</div>
						</v-card-text>
					</v-card>

					<v-card class="mx-auto" v-if='step == 1 && !stripeAvailable'>
						<v-card-text>
							<h5><i class="fas fa-address-card"></i> Order Confirmation</h5>
							<p>Review your order on the left. If everything looks accurate, hit confirm below and we will start processing your order.</p>
							<p>As a payment processor isn't available on this platform, we will reach out to you and inform you how to complete your order</p>
							<button type='button' class='btn btn-primary' @click='confirmOrder'><i class='fas fa-envelope'></i> Confirm Order</button>
						</v-card-text>
					</v-card>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import billingShippingFormComponent from '@/components/shared/billingShippingFormComponent';
	import addressFormatComponent from '@/components/shared/addressFormatComponent';
	export default {
		name      : "checkout-component",
		props     : [],
		components: {
			billingShippingFormComponent,
			addressFormatComponent
		},
		created()   {},
		data()      {
			return {
				shippingAsBilling: true,
				step: 0,
				billing: {},
				shipping: {}
			}
		},
		computed  : {
			cart() {
				return this.$store.state.cartStore.cart;
			},
			cartTotal() {
				return this.$store.getters['cartStore/totalItems'];
			},
			totalPrice() {
				return this.$store.getters['cartStore/totalPrice'];
			},
			settings() {
				return this.$store.state.settingsStore.settings;
			},
			stripeAvailable() {
				return this.settings.stripePayment == "1"
			}
		},
		methods   : {
			confirmOrder() {
				this.step++;
				var payload = {
					cart: this.cart,
					billing: this.billing,
					shipping: this.shipping,
					user: this.$store.state.userStore.user
				}
				this.$Helper.apiHelper.checkout(payload).then(response => {
					this.$store.dispatch('cartStore/emptyCart');
					this.$Helper.alertHelper.orderComplete();
				});
			}
		},
		watch     : {
			billing: {
				deep: true,
				handler: function(newVal, oldVal) {
					console.log(newVal);
					if (this.shippingAsBilling) {
						this.shipping = newVal;
					}
				}
			}
		}
	};
</script>

<style scoped></style>
