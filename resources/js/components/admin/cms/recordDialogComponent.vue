<template>
	<v-dialog width="1080" v-model='displayModal'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>
					<span v-if='record.length === 0'>Create </span>
					<span v-if='record.length > 0'>Edit </span>
					{{ currentModule.name }} Record
				</span>
        	</v-card-title>
        	<v-card-text>
        		<div class='row'>
        			<div class='col-xs-12 col-sm-6 col-md-6' v-for='(field, index) in currentModule.fields' :key='index'>
        				<fieldTypeComponent v-model='data.data[field.name]' :setValue='data.data[field.name]' :field='field' />
        			</div>
        		</v-expansion-panel>
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
	import fieldTypeComponent from '@/components/admin/cms/fieldTypeComponent';

	export default {
		name      : "record-dialog-component",
		props     : [
			'record'
		],
		components: {
			modalCancelRefreshSaveComponent,
			fieldTypeComponent
		},
		created()   {},
		data()      {
			return {
				displayModal: true,
				editor: ClassicEditor,
                editorConfig: {},
				data: {
					id: (this.record.length > 0) ? this.record[0].id : null,
					mid: (this.record.length > 0) ? this.record[0].mid : this.$route.params.id,
					data: (this.record.length > 0) ? this.record[0].data : {}
				}
			}
		},
		computed  : {
			modulesList() {
				return this.$store.state.cmsStore.modules;
			},
			currentModule() {
				const modules = this.modulesList;
				let moduleData = null;
				for (var i in modules) {
					if (modules[i].id === parseInt(this.$route.params.id)) {
						moduleData = modules[i];
					}
				}
				return moduleData;
			}
		},
		methods   : {
			reset() {
				this.data = {};
			},
			save() {
				var data = {
					id: this.data.id,
					mid: this.data.mid,
					data: JSON.stringify(this.data.data)
				};
				this.$store.dispatch('cmsRecordsStore/saveStore', data);
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
