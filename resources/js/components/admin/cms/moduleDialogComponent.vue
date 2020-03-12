<template>
	<v-dialog width="800" v-model='displayModal'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>Module</span>
        	</v-card-title>
        	<v-card-text>
				<div class='row'>
					<div class='col-md-4'>
						<v-text-field v-model="data.name" label="Name" class='required' clearable></v-text-field>
					</div>
					<div class='col-md-8'>
						<v-text-field v-model="data.description" label="Description" clearable></v-text-field>
					</div>
				</div>
				<div class='row'>
					<div class='col text-right'>
						<button type='button' class='btn btn-primary' @click='addField'><i class='fas fa-plus'></i> Add Field</button>
					</div>
				</div>
				<div class='row' v-if='data.fields.length === 0'>
					<div class='col overline text-center'>You have no fields!</div>
				</div>
				<div class='row' v-for='(item, index) in data.fields' :key='index'>
					<div class='col-md-5'>
						<v-text-field v-model='item.name' label='Name' placeholder='Field Name' clearable dense />
					</div>
					<div class='col-md-5'>
						<v-select v-model='item.type' :items="dataTypes" :item-text='item => item.value' :item-value='item => item.value' label="Type" placeholder='Data Type' clearable dense  />
					</div>
					<div class='col-md-2'>
						<button type='button' class='btn btn-danger btn-sm' @click='deleteField(index)' :disabled='index === 0'><i class='fas fa-trash'></i> Remove</button>
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
		name      : "module-dialog-component",
		props     : [
			'module'
		],
		components: {
			modalCancelRefreshSaveComponent
		},
		created()   {
			if (this.module.length === 0) {
				this.data.fields.push({
					name: 'name',
					type: 'single-text'
				});
			}
		},
		data()      {
			return {
				displayModal: true,
				editor: ClassicEditor,
                editorConfig: {},
				data: {
					id: (this.module.length > 0) ? this.module[0].id : null,
					name: (this.module.length > 0) ? this.module[0].name : null,
					description: (this.module.length > 0) ? this.module[0].description : null,
					fields: (this.module.length > 0) ? JSON.parse(this.module[0].fields) : []
				}
			}
		},
		computed  : {
			modulesList() {
				return this.$store.state.cmsStore.modules;
			},
			dataTypes() {
				const baseTypes = [
					'text',
					'big-text',
					'wysiwyg',
					'number',
					'date',
					'datetime',
					'time',
					'file',
					'mdi-icon',
					'fa-icon'
				];
				let types = [];
				for (var i in baseTypes) {
					types.push('single-' + baseTypes[i]);
					types.push('list-' + baseTypes[i]);
				}

				for (var i in this.modulesList) {
					types.push('single-' + this.modulesList[i]);
					types.push('list-' + this.modulesList[i]);
				}
				return types;
			}
		},
		methods   : {
			addField() {
				this.data.fields.push({
					name: null,
					type: null
				});
			},
			deleteField(index) {
				this.data.fields.splice(index, 1);
			},
			reset() {
				this.data = {};
			},
			save() {
				var data = {
					id: this.data.id,
					name: this.data.name,
					description: this.data.description,
					fields: JSON.stringify(this.data.fields)
				};
				this.$store.dispatch('cmsStore/saveStore', data);
				this.closeDialog();
			},
			closeDialog() {
				this.$emit('closeDialog');
			}
		},
		watch     : {
			displayModal() {
				this.$emit('closeDialog');
			}
		}
	};
</script>

<style scoped></style>
