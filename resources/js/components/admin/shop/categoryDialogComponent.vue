<template>
	<v-dialog width="725" v-model='categoryModal'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>Category</span>
        	</v-card-title>
        	<v-card-text>
				<div class='row'>
					<div class='col-md-12'>
						<v-text-field v-model="data.name" label="Name" class='required' clearable></v-text-field>
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
	import * as moment from 'moment';
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
				categoryModal: true,
				data: {
					name: null
				}
			}
		},
		computed  : {},
		methods   : {
			reset() {
				this.data.name = null;
			},
			save() {
				this.$store.dispatch('shopStore/saveCategory', this.data);
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
