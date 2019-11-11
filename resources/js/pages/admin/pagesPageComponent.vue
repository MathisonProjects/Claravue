<template>
	<div>
		<div class='row'>
			<div class='col text-right'>
				<button type='button' class='btn btn-primary' @click='info.page = "setPage"' v-if='info.page == "list"'><i class='fas fa-plus'></i> New Page</button>
				<button type='button' class='btn btn-primary' @click='info.page = "list"' v-if='info.page == "setPage"'><i class='fas fa-align-justify'></i> List</button>
			</div>
		</div>
		<listPagesComponent v-if='info.page == "list"' :params.sync='info' />
		<setPageComponent v-if='info.page == "setPage"' :params.sync='info' />
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
		created()   {

		},
		data()      {
			return {
				info: {
					page: 'list',
					id: null
				}
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
