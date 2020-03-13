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
						<v-select v-model='data.categories' :items="categories" :item-text='item => item.name' :item-value='item => item.id' multiple label="Categories"></v-select>
					</div>
					<div class='col-md-6'>
						<v-text-field v-model="data.amount" label="Cost" class='required' clearable></v-text-field>
					</div>
					<div class='col-md-6'>
						<v-text-field v-model="data.sku" label="SKU #" class='required' clearable></v-text-field>
					</div>
				</div>
				<v-expansion-panels accordion focusable>
					<v-expansion-panel>
						<v-expansion-panel-header>Description</v-expansion-panel-header>
						<v-expansion-panel-content class='pt-3'>
							<div class='row'>
								<div class='col-md-12'>
									<v-text-field v-model="data.short_description" label="Short Description" class='required' clearable></v-text-field>
								</div>
								<div class='col-md-12'>
									<ckeditor :editor="editor" v-model="data.long_description" :config="editorConfig"></ckeditor>
								</div>
							</div>
						</v-expansion-panel-content>
					</v-expansion-panel>
					<v-expansion-panel>
						<v-expansion-panel-header>Images <a href='javascript:void(0)' title='Images need to be loaded before being selected here.'>[?]</a></v-expansion-panel-header>
						<v-expansion-panel-content class='pt-3'>
							<div class='row'>
								<div class='col-md-12'>
									<v-select v-model='data.meta.images' :items="imageList" multiple label="Image"></v-select>
								</div>
							</div>
							<div class='row' v-if='data.meta.images.length > 0'>
								<div class='col-md-3' v-for='image in data.meta.images'><img :src='$Helper.formatHelper.formatUpload(image)' class='w-100' /></div>
							</div>
						</v-expansion-panel-content>
					</v-expansion-panel>
					<v-expansion-panel>
						<v-expansion-panel-header>Variations</v-expansion-panel-header>
						<v-expansion-panel-content class='pt-3'>
							<div class='row'>
								<div class='col text-right'>
									<button type='button' class='btn btn-primary'><i class='fas fa-plus'></i> Add Variation</button>
								</div>
							</div>
						</v-expansion-panel-content>
					</v-expansion-panel>
					<v-expansion-panel>
						<v-expansion-panel-header>Social Media</v-expansion-panel-header>
						<v-expansion-panel-content class='pt-3'>
							<div class='row'>
								<div class='col-md-6'>
									<v-text-field v-model="data.meta.socialMedia.website" label="Website" clearable></v-text-field>
								</div>
								<div class='col-md-6'>
									<v-text-field v-model="data.meta.socialMedia.twitter" label="Twitter" clearable></v-text-field>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<v-text-field v-model="data.meta.socialMedia.facebook" label="Facebook" clearable></v-text-field>
								</div>
								<div class='col-md-6'>
									<v-text-field v-model="data.meta.socialMedia.instagram" label="Instagram" clearable></v-text-field>
								</div>
							</div>
						</v-expansion-panel-content>
					</v-expansion-panel>
				</v-expansion-panels>
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
		name      : "product-dialog-component",
		props     : [
			'product'
		],
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
					id: (this.product.length > 0) ? this.product[0].id : null,
					sku: (this.product.length > 0) ? this.product[0].sku : null,
					categories: (this.product.length > 0) ? this.product[0].categories : [],
					name: (this.product.length > 0) ? this.product[0].name : null,
					short_description: (this.product.length > 0) ? this.product[0].short_description : null,
					long_description: (this.product.length > 0) ? this.product[0].long_description : null,
					amount: (this.product.length > 0) ? this.product[0].amount : 0,
					meta: (this.product.length > 0) ? this.product[0].meta : {
						images: [],
						variations: [],
						socialMedia: {
							website: null,
							twitter: null,
							facebook: null,
							instagram: null
						}
					}
				}
			}
		},
		computed  : {
			categories() {
				return this.$store.state.shopStore.categories;
			},
			imageList() {
				return this.$store.state.fileStore.files.filter(item => {
					return item.includes('jpeg') || item.includes('png') || item.includes('jpg');
				});
			}
		},
		methods   : {
			reset() {
				this.data.name = null;
			},
			save() {
				var data = {
					id: this.data.id,
					sku: this.data.sku,
					categories: JSON.stringify(this.data.categories),
					name: this.data.name,
					short_description: this.data.short_description,
					long_description: this.data.long_description,
					amount: this.data.amount,
					meta: JSON.stringify(this.data.meta)
				}
				this.$store.dispatch('shopStore/saveItems', data);
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
