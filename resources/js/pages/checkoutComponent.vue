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
				<v-card class="mx-auto" v-if='step > 0'>
					<v-card-text>
						<button type='button' class='btn btn-primary mb-2' @click='step = 0'><i class='fas fa-edit'></i> Edit Billing and Shipping</button>
						<h5>Billing</h5>
						<addressFormatComponent :address='billing' />
						<h5>Shipping</h5>
						<addressFormatComponent :address='shipping' />
					</v-card-text>
				</v-card>

			</div>
			<div class='col-xs-12 col-md-6' v-if='step == 0'>
				<v-card class="mx-auto">
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
			}
		},
		methods   : {},
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
