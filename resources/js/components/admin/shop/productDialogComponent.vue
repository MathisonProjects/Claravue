<template>
	<v-dialog width="725" v-model='productModal'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>Product</span>
        	</v-card-title>
        	<v-card-text>
				<div class='row'>
					<div class='col-md-4'>
						<v-text-field v-model="data.name" label="Name" class='required' clearable></v-text-field>
					</div>
					<div class='col-md-8'>
						<v-text-field v-model="data.short_description" label="Short Description" class='required' clearable></v-text-field>
					</div>
				</div>

				<div class='row'>
					<div class='col-md-8'>
						<v-select v-model='data.categories' :items="categories" :item-text='item => item.name' :item-value='item => item.id' multiple label="Categories"></v-select>
					</div>
					<div class='col-md-4'>
						<v-text-field v-model="data.amount" label="Cost" class='required' clearable></v-text-field>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-12'>
						<ckeditor :editor="editor" v-model="data.long_description" :config="editorConfig"></ckeditor>
					</div>
				</div>
        	</v-card-text>
        	<v-divider></v-divider>
			<modalCancelRefreshSaveComponent @save='save' @reset='reset' @closeDialog='closeDialog' :disabled='data.name == null' />
		</v-card>
	</v-dialog>
</template>

<script>
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import modalCancelRefreshSaveComponent from '@shared/modalCancelRefreshSaveComponent';

	export default {
		name      : "category-dialog-component",
		props     : [],
		components: {
			modalCancelRefreshSaveComponent
		},
		created()   {},
		data()      {
			return {
				productModal: true,
				editor: ClassicEditor,
                editorConfig: {},
				data: {
					sku: null,
					categories: [],
					name: null,
					short_description: null,
					long_description: null,
					amount: 0,
					meta: {}
				}
			}
		},
		computed  : {
			categories() {
				return this.$store.state.shopStore.categories;
			}
		},
		methods   : {
			reset() {
				this.data.name = null;
			},
			save() {
				this.$store.dispatch('shopStore/saveItems', this.data);
				this.closeDialog();
			},
			closeDialog() {
				this.$emit('closeDialog');
			}
		},
		watch     : {
			addItemModal() {
				this.closeDialog();
			}
		}
	};
</script>

<style scoped></style>
