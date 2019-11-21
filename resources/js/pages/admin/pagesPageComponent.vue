<template>
	<div>
		<div class='row'>
			<div class='col' v-if='info.page == "list"'>
				<h3><v-icon x-large>mdi-file-outline</v-icon> Page List</h3>	
			</div>
			<div class='col' v-if='info.page == "setPage"'>
				<h3 v-if='pageEdit.length == 0'>Add Page</h3>
				<h3 v-if='pageEdit.length > 0'>Edit Page</h3>
			</div>
			<div class='col text-right'>
				<button type='button' class='btn btn-primary' @click='info.page = "setPage"' v-if='info.page == "list" && pageEdit.length == 0'><i class='fas fa-plus'></i> New Page</button>
				<button type='button' class='btn btn-primary' @click='info.page = "setPage"' v-if='info.page == "list" && pageEdit.length > 0'><i class='fas fa-plus'></i> Edit Page</button>
				<button type='button' class='btn btn-primary' @click='info.page = "list"' v-if='info.page == "setPage"'><i class='fas fa-align-justify'></i> List</button>
			</div>
		</div>
		<listPagesComponent v-if='info.page == "list"' :params.sync='info' @setEdit='setEdit' />
		<setPageComponent v-if='info.page == "setPage"' :params.sync='info' :pageEdit='pageEdit' />
	</div>
</template>

<script>
	import listPagesComponent from '@/components/admin/pages/listPagesComponent'
	import setPageComponent from '@/components/admin/pages/setPageComponent'
	export default {
		name      : "pages-page-component",
		props     : [],
		components: {
			listPagesComponent,
			setPageComponent
		},
		created()   {},
		data()      {
			return {
				info: {
					page: 'list',
					id: null
				},
				pageEdit: []
			}
		},
		computed  : {},
		methods   : {
			setEdit(val) {
				this.pageEdit = val;
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
