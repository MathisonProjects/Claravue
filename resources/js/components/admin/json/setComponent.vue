<template>
	<v-dialog width="725" v-model='jsonDialog'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>JSON</span>
        	</v-card-title>
        	<v-card-text>
				<div class='row'>
					<div class='col-xs-12 col-md-3'>
						<v-text-field v-model="data.name" label="Name" class='required' clearable></v-text-field>
					</div>
					<div class='col-xs-12 col-md-9'>
						<v-text-field v-model="data.description" label="Description" class='required' clearable></v-text-field>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-12 text-right'>
						<button type='button' class='btn btn-primary btn-sm' @click='addField'><i class='fas fa-plus'></i> Add Field</button>
					</div>
				</div>
				<div class='row' v-for='(type, index) in data.data.types' :key='index'>
					<div class='col-md-5'>
						<v-text-field v-model='data.data.types[index].name' label='Field Name' placeholder='eg. Name/Description' clearable dense />
					</div>
					<div class='col-md-5'>
						<v-select v-model='data.data.types[index].type' :items="fieldTypes" label="Data Type" placeholder='eg. String' clearable dense  />
					</div>
					<div class='col-md-2'>
						<button type='button' class='btn btn-danger btn-sm' @click='removeItem(index)'><i class='fas fa-minus'></i> Delete</button>
					</div>
				</div>
        	</v-card-text>
        	<v-divider></v-divider>
			<modalCancelRefreshSaveComponent @save='save' @reset='reset' @closeDialog='closeDialog' :disabled='data.name == null' />
		</v-card>
	</v-dialog>
</template>

<script>
	import modalCancelRefreshSaveComponent from '@shared/modalCancelRefreshSaveComponent';
	export default {
		name      : "set-component",
		props     : [
			'jsonData'
		],
		components: {
			modalCancelRefreshSaveComponent
		},
		created()   {},
		data()      {
			return {
				jsonDialog: true,
				data: {
					id: (this.jsonData.length > 0) ? this.jsonData[0].id : null,
					name: (this.jsonData.length > 0) ? this.jsonData[0].name : null,
					description: (this.jsonData.length > 0) ? this.jsonData[0].description : null,
					data: (this.jsonData.length > 0) ? JSON.parse(this.jsonData[0].data) : {
						types: [],
						values: []
					}
				},
				fieldTypes: [
					'boolean',
					'datetime',
					'number',
					'string'
				]
			}
		},
		computed  : {},
		methods   : {
			reset() {
				this.data.name = null;
			},
			save() {
				var payload = {
					id: this.data.id,
					name: this.data.name,
					description: this.data.description,
					data: JSON.stringify(this.data.data)
				};
				this.$store.dispatch('jsonRecordsStore/savejson', payload);
				this.$Helper.alertHelper.jsonSaved();
				this.closeDialog();
			},
			closeDialog() {
				this.$emit('closeDialog');
			},
			addField() {
				this.data.data.types.push({
					name: null,
					type: null
				});
			},
			removeItem(index) {
				this.data.data.types.splice(index,1);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
