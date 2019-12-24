<template>
	<v-dialog width="725" v-model='addItemModal'>
		<v-card v-if='type == "project"'>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span v-if='dialogData == null'>New </span>Project
        	</v-card-title>

       		<v-card-text>
				<div class='form-group text-right'>
					<v-text-field v-model="data.project.Name" label="Name*" clearable></v-text-field>
					<v-text-field v-model="data.project.Description" label="Description" clearable></v-text-field>
				</div>
        	</v-card-text>

        	<v-divider></v-divider>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="primary" text @click='reset'><i class='fas fa-redo'></i> Refresh</v-btn>
				<v-btn color="primary" text :disabled='(data.project.Name == null) || (data.project.Description == null)' @click='save'>Save</v-btn>
			</v-card-actions>
		</v-card>
		<v-card v-if='type == "categorie"'>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span v-if='dialogData == null'>New </span>Category
        	</v-card-title>
        	<v-card-text>
        		<div class='form-group text-right'>
					<v-text-field v-model="data.category.Name" label="Name" clearable></v-text-field>
					<v-text-field v-model="data.category.Description" label="Description" clearable></v-text-field>
				</div>
        	</v-card-text>
        	<v-divider></v-divider>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="primary" text @click='reset'><i class='fas fa-redo'></i> Refresh</v-btn>
				<v-btn color="primary" text :disabled='(data.category.Name == null) || (data.category.Description == null)' @click='save'>Save</v-btn>
			</v-card-actions>
		</v-card>
		<v-card v-if='type == "task"'>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span v-if='dialogData == null'>New Task</span>
				<span v-if='dialogData != null'>T#{{ dialogData.id }}: {{ dialogData.Name }}</span>
        	</v-card-title>
        	<v-card-text>
				<v-text-field v-model="data.task.Name" label="Name" clearable></v-text-field>
				<ckeditor :editor="editor" v-model="data.task.Description" :config="editorConfig"></ckeditor>
				<div class='row'>
					<div class='col-md-6'>
						<v-select v-model='data.task.SubtaskOf' label="Subtask of"></v-select>
					</div>
					<div class='col-md-6'>
						<v-select v-model='data.task.Status' :items="statusTypes" item-value='id' item-text='text' label="Status" autocomplete bottom></v-select>
					</div>
				</div>
        	</v-card-text>
        	<v-divider></v-divider>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="primary" text @click='reset'><i class='fas fa-redo'></i> Refresh</v-btn>
				<v-btn color="primary" text @click='save'><i class='fas fa-save' :disabled='(data.task.Name == null) || (data.task.Status == null)'></i> Save</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>

<script>
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

	export default {
		name      : "dialog-add-item-component",
		props     : [
			'type',
			'dialogData'
		],
		components: {},
		created()   {},
		data()      {
			return {
				addItemModal: true,
				editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {},
				data: {
					project: {
						id: (this.dialogData == null) ? null : this.dialogData.id,
						Name: (this.dialogData == null) ? null : this.dialogData.Name,
						Description: (this.dialogData == null) ? '' : this.dialogData.Description
					},
					category: {
						id: (this.dialogData == null) ? null : this.dialogData.id,
						ProjectId: null,
						Name: (this.dialogData == null) ? null : this.dialogData.Name,
						Description: (this.dialogData == null) ? '' : this.dialogData.Description
					},
					task: {
						id: (this.dialogData == null) ? null : this.dialogData.id,
						CategoryId: (this.dialogData == null) ? null : this.dialogData.CategoryId,
						Name: (this.dialogData == null) ? null : this.dialogData.Name,
						Description: (this.dialogData == null) ? '' : this.dialogData.Description,
						SubtaskOf: (this.dialogData == null) ? null : this.dialogData.SubtaskOf,
						Status: (this.dialogData == null) ? 0 : this.dialogData.Status
					}
				},
				statusTypes: [
					{ id: 0, text: 'Ready' },
					{ id: 1, text: 'Active' },
					{ id: 2, text: 'PR Pending' },
					{ id: 3, text: 'QA' },
					{ id: 4, text: 'Complete' },
					{ id: 5, text: 'Roadblock' }
				]
			}
		},
		computed  : {
			pid() {
				if (this.$route.params && this.$route.params.pid) {
					return parseInt(this.$route.params.pid);
				}
				return null;
			},
			cid() {
				if (this.$route.params && this.$route.params.catid) {
					return parseInt(this.$route.params.catid);
				}
				return null;
			}
		},
		methods   : {
			reset() {
				this.data = {
					project: {
						id: null,
						Name: null,
						Description: ''
					},
					category: {
						id: null,
						ProjectId: null,
						Name: null,
						Description: ''
					},
					task: {
						id: null,
						CategoryId: null,
						Name: null,
						Description: '',
						SubtaskOf: null,
						Status: 0
					}
				};
			},
			save() {
				if (this.type == 'project') {
					var payload = this.data.project;
					this.$store.dispatch('todoStore/saveProject', payload);
				} else if (this.type == 'categorie') {
					var payload = this.data.category;
					payload.ProjectId = this.pid;
					this.$store.dispatch('todoStore/saveCategory', payload);
				} else if (this.type == 'task') {
					var payload = this.data.task;
					payload.CategoryId = this.cid;
					this.$store.dispatch('todoStore/saveTask', payload);
				}
				this.reset();
				this.$emit('closeDialog');
			}
		},
		watch     : {
			addItemModal() {
				this.$emit('closeDialog');
			}
		}
	};
</script>

<style scoped></style>
