<template>
	<div>
		<h1>{{ product.name }}</h1>

		<div class='row'>
			<div class='col-xs-12 col-sm-4 col-md-6'>
				<div class='row'>
					<div class='col-xs-12 col-md-2'>
						<p v-for='(image, index) in images' :key='index'>
							<a href='javascript:void(0)' @click='displayedImage = index'><img :src='image' class='w-100' /></a>
						</p>
					</div>
					<div class='col-xs-12 col-md-10'>
						<img :src='images[displayedImage]' class='w-100' />
					</div>
				</div>
			</div>
			<div class='col-xs-12 col-sm-4 col-md-3'>
				<p v-if='!moreText'>{{ product.short_description }} <a href='javascript:void(0)' @click='moreText = true'>More...</a></p>
				<p v-if='moreText' v-html='product.long_description'></p>
			</div>
			<div class='col-xs-12 col-sm-4 col-md-3'>
				<v-card class="mx-auto text-center">
					<v-card-text>
						<p>
							<a v-if='product.meta.socialMedia.website !== null' class='text-info' :href='product.meta.socialMedia.website' target='_BLANK' :title='product.meta.socialMedia.website'><i class="fas fa-home"></i></a>
							<a v-if='product.meta.socialMedia.facebook !== null' class='text-primary' :href='product.meta.socialMedia.facebook' target='_BLANK' :title='product.meta.socialMedia.facebook'><i class="fab fa-facebook-square"></i></a>
							<a v-if='product.meta.socialMedia.twitter !== null' class='text-info' :href='product.meta.socialMedia.twitter' target='_BLANK' :title='product.meta.socialMedia.twitter'><i class="fab fa-twitter-square"></i></a>
							<a v-if='product.meta.socialMedia.instagram !== null' class='text-danger' :href='product.meta.socialMedia.instagram' target='_BLANK' :title='product.meta.socialMedia.instagram'><i class="fab fa-instagram"></i></a>
						</p>
						<p>${{ product.amount }}</p>
						<button type='button' class='btn btn-primary btn-sm'><i class='fas fa-shopping-cart'></i> Add to Cart</button>
					</v-card-text>
				</v-card>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "product-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				moreText: false,
				displayedImage: 0
			}
		},
		computed  : {
			images() {
				var images = [];
				for (var i in this.product.meta.images) {
					images.push('/upload/' + this.product.meta.images[i]);
				}
				return images;
			},
			pid() {
				return parseInt(this.$route.params.pid);
			},
			product() {
				return this.$store.state.shopStore.items.filter(item => {
					return item.id === this.pid;
				})[0];
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
