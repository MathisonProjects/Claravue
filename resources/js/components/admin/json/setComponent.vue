<template>
	<v-dialog width="725" v-model='jsonDialog'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>JSON</span>
        	</v-card-title>
        	<v-card-text>
				<div class='row'>
					<div class='col-md-12'>
						<v-text-field v-model="data.name" label="Name" class='required' clearable></v-text-field>
					</div>
					<div class='col-md-12'>
						<v-text-field v-model="data.description" label="Description" class='required' clearable></v-text-field>
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
					name: null,
					description: null,
					data: {
						types: [],
						values: []
					}
				}
			}
		},
		computed  : {},
		methods   : {
			reset() {
				this.data.name = null;
			},
			save() {
				var payload = {
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
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
