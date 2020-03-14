<template>
	<div>
		<div v-if='field.type === "single-text"'>
			<v-text-field v-model='fieldValue' :label='field.name' clearable dense />
		</div>
		<div v-if='field.type === "list-text"'>
			<v-chip v-for='(item, index) in fieldValue' :key='index' color='blue' text-color='white' class="ma-2" close @click:close='deleteItem(index)'>{{ item }}</v-chip>
			<div class='row'>
				<div class='col-8'>
					<v-text-field v-model='fillableField' :label='field.name' clearable dense />
				</div>
				<div class='col-4'>
					<button type='button' class='btn btn-primary btn-sm' @click='addFillableField'><i class='fas fa-plus'></i> Add</button>
				</div>
			</div>
		</div>
		<div v-if='field.type === "single-big-text"'>
			<v-textarea v-model="fieldValue" :label='field.name' />
		</div>
		<div v-if='field.type === "list-big-text"'>
			<v-chip v-for='(item, index) in fieldValue' :key='index' color='blue' text-color='white' class="ma-2" close @click:close='deleteItem(index)'>{{ item }}</v-chip>
			<div class='row'>
				<div class='col-md-8'>
					<v-textarea v-model='fillableField' :label='field.name' clearable dense />
				</div>
				<div class='col-md-4'>
					<button type='button' class='btn btn-primary btn-sm' @click='addFillableField'><i class='fas fa-plus'></i> Add</button>
				</div>
			</div>
		</div>
		<div v-if='field.type === "single-wysiwyg"'>
			<ckeditor :editor="editor" v-model="fieldValue" :config="editorConfig"></ckeditor>
		</div>
		<div v-if='field.type === "list-wysiwyg"'>
			<div class='row' v-for='(item, index) in fieldValue' :key='index'>
				<div class='col-md-1'>
					<a href='javascript:void(0)' @click='deleteItem(index)'><i class='fas fa-trash'></i></a>
				</div>
				<div class='col-md-11' v-html='item'></div>
			</div>
			<div class='row'>
				<div class='col-md-9'>
					<ckeditor :editor="editor" v-model="fillableField" :config="editorConfig"></ckeditor>
				</div>
				<div class='col-md-3'>
					<button type='button' class='btn btn-primary btn-sm' @click='addFillableField'><i class='fas fa-plus'></i> Add</button>
				</div>
			</div>
		</div>
		<div v-if='field.type === "single-number"'>
			<v-text-field v-model='fieldValue' :label='field.name' type='number' clearable dense />
		</div>
		<div v-if='field.type === "list-number"'>
			<v-chip v-for='(item, index) in fieldValue' :key='index' color='blue' text-color='white' class="ma-2" close @click:close='deleteItem(index)'>{{ item }}</v-chip>
			<div class='row'>
				<div class='col-8'>
					<v-text-field v-model='fillableField' :label='field.name' type='number' clearable dense />
				</div>
				<div class='col-4'>
					<button type='button' class='btn btn-primary btn-sm' @click='addFillableField'><i class='fas fa-plus'></i> Add</button>
				</div>
			</div>
		</div>
		<div v-if='field.type === "single-date"'>
			<v-date-picker v-model='fieldValue' full-width />
		</div>
		<div v-if='field.type === "list-date"'>
			List Date Unsupported...
		</div>
		<div v-if='field.type === "single-datetime"'>
			<input v-model='fillableField' type="datetime-local" name="datetime" />
		</div>
		<div v-if='field.type === "list-datetime"'>
			List Datetime Unsupported
		</div>
		<div v-if='field.type === "single-time"'>
			<v-time-picker v-model="fieldValue" type="month" width="290" class="ml-4"></v-time-picker>
		</div>
		<div v-if='field.type === "list-time"'>
			List Time Unsupported
		</div>
		<div v-if='field.type === "single-file"'>
			<v-select v-model='fieldValue' :items="filesList" :item-text='item => item.value' :item-value='item => item.value' :label="field.name" clearable dense  />
		</div>
		<div v-if='field.type === "list-file"'>
			<v-select v-model='fieldValue' :items="filesList" :item-text='item => item.value' :item-value='item => item.value' :label="field.name" clearable dense chips multiple />
		</div>
		<div v-if='field.type === "single-mdi-icon"'>
			<v-select v-model='fieldValue' :items="mdiIconList" :item-text='item => item.value' :item-value='item => item.value' :label="field.name" clearable dense  />
		</div>
		<div v-if='field.type === "list-mdi-icon"'>
			<v-select v-model='fieldValue' :items="mdiIconList" :item-text='item => item.value' :item-value='item => item.value' :label="field.name" clearable dense chips multiple />
		</div>
		<div v-if='field.type === "single-fa-icon"'>
			<v-select v-model='fieldValue' :items="faIconList" :item-text='item => item.value' :item-value='item => item.value' :label="field.name" clearable dense  />
		</div>
		<div v-if='field.type === "list-fa-icon"'>
			<v-select v-model='fieldValue' :items="faIconList" :item-text='item => item.value' :item-value='item => item.value' :label="field.name" clearable dense chips multiple />
		</div>
	</div>
</template>

<script>
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import modalCancelRefreshSaveComponent from '@shared/modalCancelRefreshSaveComponent';
	export default {
		name      : "field-type-component",
		props     : [
			'field',
			'setValue'
		],
		model: {
			event: 'updateSelected'
		},
		components: {},
		created()   {},
		data()      {
			return {
				displayModal: true,
				editor: ClassicEditor,
                editorConfig: {},
                fillableField: null,
				fieldValue: (this.setValue !== null && this.setValue !== undefined) ? this.setValue : null
			}
		},
		computed  : {
			filesList() {
				return this.$store.state.fileStore.files;
			},
			mdiIconList() {
				return this.$store.state.jsonStore.materialIconsList;
			},
			faIconList() {
				return this.$store.state.jsonStore.fontAwesomeIconsList;
			}
		},
		methods   : {
			addFillableField() {
				if (this.fieldValue === null) {
					this.fieldValue = [];
				}
				this.fieldValue.push(this.fillableField);
				this.fillableField = null;
			},
			deleteItem(index) {
				this.fieldValue.splice(index, 1);
			}
		},
		watch     : {
			fieldValue(newValue) {
				this.$emit('updateSelected', newValue);
			}
		}
	};
</script>

<style scoped></style>
