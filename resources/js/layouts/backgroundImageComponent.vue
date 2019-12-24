<template>
	<div id='preload-images' v-if='backgroundPages.length > 0'>
		<div v-for='(image, index) in backgroundPages' :key='index' :style='imageSet(image)' :class='currentBgSetter(image)'></div>
	</div>
</template>

<script>
	export default {
		name      : "background-image-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {}
		},
		computed  : {
			pages() {
				return this.$store.state.pageStore.pages;
			},
			backgroundPages() {
				var bgPages = [];
				for (var i in this.pages) {
					var data = JSON.parse(this.pages[i].data);
					data.key = this.pages[i].key;

					if (data.bgImage != undefined && data.bgImage != null) {
						bgPages.push(data);
					}
				}
				return bgPages;
			}
		},
		methods   : {
			imageSet(image) {
				return 'background-image: url("/upload/' + image.bgImage + '");'
			},
			currentBgSetter(item) {
				if (
					('/page/' + item.key == this.$route.path) ||
					('/blog/' + item.key == this.$route.path) ||
					(this.$route.path == '/' && item.key == 'home')
					) {
					return 'bgCover';
				} else {
					return '';
				}
			}
		},
		watch     : {}
	};
</script>

<style scoped>
	#preload-images {
		background: no-repeat -9999px -9999px;
	}
	.bgCover {
		background-repeat: no-repeat !important;
		background-size: cover !important;
		width: 100% !important;
  		height: calc(100%) !important;
  		position: absolute;
  		z-index: 0 !important;
	}
</style>
