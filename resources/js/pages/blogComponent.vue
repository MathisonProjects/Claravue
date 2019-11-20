<template>
	<div>
		<h1>Blog</h1>

		<v-card class="mx-auto mb-2" v-for='(blogItem,index) in blogs' :key='index'>
			<v-card-text>
				<div class='row'>
					<div class='col-xs-12 col-md-6'>
						<a href='javascript:void(0)' @click='goToBlog(blogItem.key)'>{{ blogItem.title }}</a><span v-if='blogItem.description != "" && blogItem.description != null'> - {{ blogItem.description }}</span>
					</div>
					<div class='col-xs-12 col-md-6 text-right'>{{ blogItem.created_at }}</div>
				</div>
			</v-card-text>
		</v-card>
	</div>
</template>

<script>
	export default {
		name      : "blog-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			blogIds() {
				return this.$store.state.blogStore.blog;
			},
			pages() {
				return this.$store.state.pageStore.pages;
			},
			blogs() {
				var blogs = [];
				for (var i in this.blogIds) {
					var blog = this.blogIds[i];
					for (var j in this.pages) {
						if (this.pages[j].id == blog.pid) {
							this.pages[j].description = blog.description;
							blogs.push(this.pages[j]);
						}
					}
				}
				return blogs;
			}
		},
		methods   : {
			goToBlog(key) {
				this.$router.push('/blog/'+key);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
