<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'><h1>Files</h1></div>
			<div class='col-xs-12 col-md-6 text-right'><button type='button' class='btn btn-primary'><i class='fas fa-plus'></i> Add File</button></div>
		</div>
		<div class='row' v-if='addingFile'>
			<div class='col'></div>
		</div>

		<v-data-table :headers="headers" :items="fileItems" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>

	</div>
</template>

<script>
	export default {
		name      : "file-name-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				addingFile: false,
				perPage: 5,
				headers: [
		          { text: 'URL', value: 'type' },
		          { text: 'Created At', value: 'created_at' },
		          { text: 'Updated At', value: 'updated_at' },
		        ],
		        selected: []
			}
		},
		computed  : {
			fileItems() {
				return [];
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
