<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'><h1><v-icon x-large>mdi-folder-open</v-icon> Files</h1></div>
			<div class='col-xs-12 col-md-6 text-right' v-if='!addingFile'>
				<button type='button' class='btn btn-danger' @click='deleteSelected' v-if='selected.length > 0'><i class='fas fa-minus'></i> Delete File</button>
				<button type='button' class='btn btn-primary' @click='addingFile = true'><i class='fas fa-plus'></i> Add File</button>
			</div>
			<div class='col-xs-12 col-md-6 text-right' v-if='addingFile'><button type='button' class='btn btn-danger' @click='addingFile = false'><i class='fas fa-window-close'></i> Done Adding Files</button></div>
		</div>
		<div class='row' v-if='addingFile'>
			<div class='col-12'>
				<v-file-input v-model='data.upload' show-size counter multiple label="File to Upload"></v-file-input>
			</div>
			<div class='col-12 text-right'>
				<button type='button' class='btn btn-primary' @click='uploadFiles'><i class='fas fa-file-upload'></i> Upload</button>
			</div>
		</div>

		<v-data-table :headers="headers" :items="fileList" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>

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
		        	{ text: 'URL', value: 'url' }
		        ],
		        selected: [],
		        data : {
		        	upload: []
		        }
			}
		},
		computed  : {
			fileItems() {
				return this.$store.state.fileStore.files;
			},
			fileList() {
				var items = [];
				for (var i in this.fileItems) {
					items[i] = {
						url: this.fileItems[i]
					};
				}
				return items;
			}
		},
		methods   : {
			uploadFiles() {
				console.log(this.data.upload[0]);
				for (var i in this.data.upload) {
					let formData = new FormData();
      				formData.append('file', this.data.upload[i]);
					this.$store.dispatch('fileStore/saveFiles', formData);
				}
			},
			deleteSelected() {
				var data = {
					file: this.selected[0].url
				};
				this.$store.dispatch('fileStore/deleteFile', data);
				this.selected = [];
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
