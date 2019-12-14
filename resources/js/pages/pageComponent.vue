<template>
	<div>
		<v-card class="mx-auto" v-if='cardify'>
			<v-card-text>
				<button type='button' class='btn btn-primary' @click='$router.go(-1)' v-if='blog'><i class='fas fa-step-backward'></i> Back</button>
				<templateFilterComponent :type='page.type' :params='page' />
			</v-card-text>
		</v-card>
		<span v-if='!cardify'>
			<templateFilterComponent :type='page.type' :params='page' />
		</span>
	</div>
</template>

<script>
	import templateFilterComponent from '@/components/templates/templateFilterComponent'
	export default {
		name      : "page-component",
		props     : [],
		components: {
			templateFilterComponent
		},
		created()   {},
		data()      {
			return {}
		},
		computed  : {
			pages() {
				return this.$store.state.pageStore.pages;
			},
			page() {
				var key = this.$route.params.key;
				if (this.pages.length > 0) {
					return this.pages.filter(page => {
						return page.key == key;
					})[0];
				}
				return null;
			},
			cardify() {
				var data = JSON.parse(this.page.data);
				return data.cardify;
			},
			blog() {
				if (this.$route.meta.blog) {
					return this.$route.meta.blog;
				}
				return false;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
