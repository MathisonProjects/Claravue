<template>
	<div>
		<div class='overline' v-if='data.created_at != null'>
			Created At: {{ data.created_at }}<br />
			Updated At: {{ data.updated_at }}<br />
		</div>

		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<div class='form-group'>
					<label for='label'>URL Key</label>
					<input type='text' id='label' class='form-control' v-model='data.key' placeholder='eg. your-page-url' />
				</div>
			</div>
			<div class='col-xs-12 col-md-6'>
				<div class='form-group'>
					<label for='label'>Page Title</label>
					<input type='text' id='label' class='form-control' v-model='data.title' placeholder='eg. Example Name' />
				</div>
			</div>
		</div>
		
		<div class='form-group'>
			<label for='label'>Page Type</label>
			<v-select v-model="data.type" :items="pageTypes" label="Page Type"></v-select>
		</div>
		
		<div class='row' v-if='data.type !== null'>
			<div class='col'>
				<div v-for='(formItem, index) in pageForm'>
					<div class='form-group'>
						<label :for='formItem.label'>{{ formItem.label }}</label>
						<input type='text' :id='formItem.label' class='form-control' v-model='data.form[index]' v-if='formItem.type == "text"' />
						<ckeditor :editor="editor" v-model="data.form[index]" :config="editorConfig" v-if='formItem.type == "wysiwyg"'></ckeditor>
						<v-select v-model="data.form[index]" :items="fileList" label="Image" v-if='formItem.type == "image"'></v-select>
					</div>
					<div v-if='formItem.type'></div>
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='col text-right'><button type='button' class='btn btn-primary' :disabled='saveReady' @click='save'><i class='fas fa-save'></i> Save</button></div>
		</div>
	</div>
</template>

<script>
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	export default {
		name      : "set-page-component",
		props     : [
			'pageEdit'
		],
		components: {
		},
		created()   {
			if (this.pageEdit.length > 0) {
				var page = this.pageEdit[0];
				var content = JSON.parse(page.data);
				this.data.id = page.id;
				this.data.created_at = page.created_at;
				this.data.updated_at = page.updated_at;
				this.data.key = page.key;
				this.data.title = page.title;
				this.data.type = page.type;
				this.data.form = content;
			}
		},
		data()      {
			return {
				editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {},
				data: {
					id: null,
					key: null,
					title: null,
					type: null,
					created_at: null,
					updated_at: null,
					form: [],
					data: null
				}
			}
		},
		computed  : {
			fileList() {
				return this.$store.state.fileList.files;
			},
			pageLayoutList() {
				return this.$store.state.jsonStore.pageLayoutList;
			},
			pageTypes() {
				var returnItems = [];
				for (var i in this.pageLayoutList) {
					returnItems.push(i);
				}
				return returnItems;
			},
			pageForm() {
				if (this.data.type != null) {
					return this.pageLayoutList[this.data.type];
				}
				return null
			},
			saveReady() {
				if (this.data.key != null && this.data.title != null && this.data.type != null) {
					return false;
				}
				return true;
			}
		},
		methods   : {
			save() {
				this.data.data = JSON.stringify(this.data.form);
				this.$store.dispatch('pageStore/savePages', this.data);
			}
		},
		watch     : {
			pageForm(newVal) {
				if (this.pageEdit.length == 0) {
					this.data.form = null;
					var obj = {};
					for (var i in this.pageForm) {
						obj[i] = null;
					}
					this.data.form = obj;
				}
			}
		}
	};
</script>

<style scoped></style>
