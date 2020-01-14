<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-sm-4 col-md-3 col-lg-2'>
				<v-card class="mx-auto">
					<v-card-text>
						<h4>Filter</h4>

						<v-select :items="categories" :item-text='item => item.name' :item-value='item => item.id' label="Category" v-model='filter.category'></v-select>

						<div class='row'>
							<div class='col-xs-12 col-md-12 text-center'>
								<button type='button' class='btn btn-primary' @click='refresh'><i class='fas fa-redo'></i> Reset</button>
							</div>
						</div>
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-sm-8 col-md-9 col-lg-10'>
				<div class='row'>
					<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4' v-for='(product, index) in filteredProducts'>
						<productItemComponent :product='product' />
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import productItemComponent from '@/components/shop/productItemComponent';
	export default {
		name      : "shop-component",
		props     : [],
		components: {
			productItemComponent
		},
		created()   {},
		data()      {
			return {
				filter: {
					category: null
				}
			}
		},
		computed  : {
			categories() {
				return this.$store.state.shopStore.categories;
			},
			filteredProducts() {
				return this.products;
			},
			products() {
				return this.$store.state.shopStore.items;
			}
		},
		methods   : {
			refresh() {
				this.filter = {
					category: null
				};
			},
			imageUrl(image) {
				return '/upload/' + image;
			},
			addProduct(item) {},
			viewProduct(item) {}
		},
		watch     : {}
	};
</script>

<style scoped></style>
