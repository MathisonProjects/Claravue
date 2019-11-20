<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1>Blog</h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-danger' v-if='selected.length > 0' @click='removeBlog'><i class='fas fa-minus'></i> Remove Selected Blog</button>
				<button type='button' class='btn btn-primary' @click='addingBlog = true'><i class='fas fa-plus'></i> Add Blog</button>
			</div>
		</div>

		<div class='row' v-if='addingBlog'>
			<div class='col text-right'>
				<div class='form-group text-right'>
					<v-text-field label='Blog Description' v-model='blogDescription'></v-text-field>
					<v-select :items="pageList" label="Blog To Add" v-model='blogToAdd'></v-select>
					<button type='button' class='btn btn-primary' @click='addBlog' :disabled='blogToAdd == null'><i class='fas fa-plus'></i> Use Blog</button>
				</div>
			</div>
		</div>

		<v-data-table :headers="headers" :items="blogItems" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "blog-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				addingBlog: false,
				blogDescription: null,
				blogToAdd: null,
				perPage: 5,
				headers: [
		          { text: 'Id', value: 'id' },
		          { text: 'URL', value: 'url' },
		          { text: 'Created', value: 'created_at' }
				],
				selected: []
			}
		},
		computed  : {
			blogItems() {
				var items = [];
				for (var i in this.$store.state.blogStore.blog) {
					for (var j in this.validPages) {
						if (this.validPages[j].id == this.$store.state.blogStore.blog[i].pid) {
							this.validPages[j].id = this.$store.state.blogStore.blog[i].id;
							this.validPages[j].url = 'https://dev-vuelaravelclean-com.mathisonprojects.dev/#/blog/' + this.validPages[j].key;
							items.push(this.validPages[j]);
						}
					}
				}
				return items;
			},
			validPages() {
				return this.$store.state.pageStore.pages.filter(page => {
					return page.type == 'content1' || page.type == 'content2';
				});
			},
			pageList() {
				var pageList = [];
				for (var i in this.validPages) {
					pageList[this.validPages[i].id] = this.validPages[i].title + " " + this.validPages[i].created_at;
				}
				return pageList;
			}
		},
		methods   : {
			addBlog() {
				var data = {
					pid: null,
					description: null
				};
				for (var i in this.validPages) {
					if (this.validPages[i].title + " " + this.validPages[i].created_at == this.blogToAdd) {
						data = {
							pid: this.validPages[i].id,
							description: this.blogDescription
						};
					}
				}

				this.$store.dispatch('blogStore/saveBlog', data);
				this.addingBlog = false;
				this.blogDescription = null;
				this.blogToAdd = null;
			},
			removeBlog() {
				var data = {
					id: this.selected[0].id
				}
				this.$store.dispatch('blogStore/deleteBlog', data);
				this.selected = [];
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
