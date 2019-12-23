<template>
	<div>
		<div class='overline' v-if='data.created_at != null'>
			Created At: {{ data.created_at }}<br />
			Updated At: {{ data.updated_at }}<br />
		</div>

		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<div class='form-group'>
					<v-text-field label="URL Key" v-model='data.key' placeholder='eg. your-page-url'></v-text-field>
				</div>
			</div>
			<div class='col-xs-12 col-md-6'>
				<div class='form-group'>
					<v-text-field label="Page Title" v-model='data.title' placeholder='eg. Example Name'></v-text-field>
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='col-md-3'>
				<v-select v-model="data.bgImage" :items="fileList" label="Background Image" clearable></v-select>
			</div>
			<div class='col-md-3'>
				<img :src='imageLink(data.bgImage)' class='w-100' v-if='data.bgImage !== undefined' />
			</div>
			<div class='col-md-6'>
				<div class='form-group'>
					<label for='label'>Cardify</label>
					<v-checkbox v-model="data.cardify" label="Enabled"></v-checkbox>
				</div>
			</div>
		</div>
		
		<div class='form-group'>
			<label for='label'>Page Type</label>
			<v-select v-model="data.type" :items="pageLayoutList" label="Page Type"></v-select>
		</div>
		
		<div class='row' v-if='data.type !== null && pageForm !== undefined'>
			<div class='col'>
				<div v-for='(formItem, index) in pageForm'>
					<div class='form-group' v-if='formItem.variant == null'>
						<v-text-field :label="formItem.label" v-model='data.form[index]' placeholder='eg. Example Name' v-if='formItem.type == "text"'></v-text-field>
						<ckeditor :editor="editor" v-model="data.form[index]" :config="editorConfig" v-if='formItem.type == "wysiwyg"'></ckeditor>
						<div class='row' v-if='formItem.type == "image"'>
							<div class='col-xs-12 col-md-6'>
								<v-select v-model="data.form[index]" :items="fileList" label="Image"></v-select>
							</div>
							<div class='col-xs-12 col-md-6'>
								<img class='w-100' :src='imageLink(data.form[index])' v-if='data.form[index] != null' />
							</div>
						</div>
					</div>
					<div class='form-group' v-if='formItem.variant == "collection"'>
						<hr />
						<div class='row'>
							<div class='col'>{{ formItem.label }}</div>
							<div class='col text-right'><button type='button' class='btn btn-primary' @click='addToCollection(index)'><i class='fas fa-plus'></i> Add Item</button></div>
						</div>
						
						<div class='row' v-if='formItem.type == "image"' v-for='(imageItem, index2) in data.form[index]'>
							<div class='col-xs-12 col-md-6'>
								<v-select v-model="data.form[index][index2]" :items="fileList" label="Image"></v-select>
							</div>
							<div class='col-xs-12 col-md-6'>
								<img class='w-100' :src='imageLink(data.form[index][index2])' v-if='data.form[index][index2] != null' />
							</div>
						</div>

						<div class='row' v-if='formItem.type == "text"' v-for='(textItem, index2) in data.form[index]'>
							<div class='col'>
								<input type='text' :id='formItem.label' class='form-control' v-model="data.form[index][index2]" />
								
							</div>
						</div>

						<div class='row' v-if='formItem.type == "wysiwyg"' v-for='(wysiwygItem, index2) in data.form[index]'>
							<div class='col'>
								<ckeditor :editor="editor" v-model="data.form[index][index2]" :config="editorConfig"></ckeditor>
							</div>
						</div>
					</div>
					<div v-if='formItem.type'></div>
				</div>
			</div>
		</div>

		<div class='row' v-if='pageForm === undefined'>
			<div class='col text-danger'><i class="fas fa-exclamation-circle"></i> This page has not been implemented yet!</div>
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
				this.data.cardify = content.cardify;
				this.data.bgImage = content.bgImage;
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
					cardify: false,
					bgDisplay: null,
					data: null
				}
			}
		},
		computed  : {
			fileList() {
				var fileList = this.$store.state.fileStore.files;
				return fileList;
			},
			pageLayoutList() {
				return this.$store.state.jsonStore.pageLayoutList.pageList;
			},
			pageForm() {
				if (this.data.type != null) {
					return this.$store.state.jsonStore.pageLayoutList.pages[this.data.type];
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
				this.data.form.cardify = this.data.cardify;
				this.data.form.bgImage = this.data.bgImage;
				this.data.data = JSON.stringify(this.data.form);
				this.$store.dispatch('pageStore/savePages', this.data);
				this.$Helper.alertHelper.pageAdded();
				if (this.data.id == null) {
					this.reset();
				}
			},
			imageLink(image) {
				return '/upload/' + image
			},
			addToCollection(index) {
				this.data.form[index].push(null);
			},
			reset() {
				this.data = {
					id: null,
					key: null,
					title: null,
					type: null,
					created_at: null,
					updated_at: null,
					form: [],
					cardify: false,
					bgDisplay: null,
					data: null
				};
			}
		},
		watch     : {
			pageForm(newVal) {
				if (this.pageEdit.length == 0) {
					this.data.form = null;
					var obj = {};
					for (var i in this.pageForm) {
						if (this.pageForm[i].variant == undefined) {
							obj[i] = null;
						} else if (this.pageForm[i].variant == 'collection') {
							obj[i] = [];
						}
					}
					this.data.form = obj;
				}
			}
		}
	};
</script>

<style scoped></style>
