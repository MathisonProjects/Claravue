<template>
	<v-dialog width="725" v-model='showDialog'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>API</span>
        	</v-card-title>
        	<v-card-text>
				<div class='row'>
					<div class='col-xs-12 col-md-3'>
						<v-text-field v-model="data.name" label="Name" class='required' clearable></v-text-field>
					</div>
					<div class='col-xs-12 col-md-9'>
						<v-text-field v-model="data.description" label="Description" class='required' clearable></v-text-field>
					</div>
					<div class='col-xs-12 col-md-12'>
						<v-text-field v-model="data.endpoint" label="Endpoint" class='required' clearable></v-text-field>
					</div>
				</div>
				<div class='row'>
					<div class='col-xs-12 col-md-6'>
						<button type='button' class='btn btn-primary btn-sm' @click='addHeader'><i class='fas fa-plus'></i> Add Header</button>
						<div class='row' v-for='(type, index) in data.header' :key='index'>
							<div class='col-md-8'>
								<v-text-field v-model='data.header[index]' label='Header Name' placeholder='eg. Header Name' clearable dense />
							</div>
							<div class='col-md-2'>
								<button type='button' class='btn btn-danger btn-sm' @click='removeHeader(index)'><i class='fas fa-minus'></i> Delete</button>
							</div>
						</div>
					</div>
					<div class='col-xs-12 col-md-6'>
						<button type='button' class='btn btn-primary btn-sm' @click='addPayload'><i class='fas fa-plus'></i> Add Payload</button>
						<div class='row' v-for='(type, index) in data.payload' :key='index'>
							<div class='col-md-8'>
								<v-text-field v-model='data.payload[index]' label='Payload Name' placeholder='eg. Payload Name' clearable dense />
							</div>
							<div class='col-md-2'>
								<button type='button' class='btn btn-danger btn-sm' @click='removePayload(index)'><i class='fas fa-minus'></i> Delete</button>
							</div>
						</div>
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
			'item'
		],
		components: {
			modalCancelRefreshSaveComponent
		},
		created()   {},
		data()      {
			return {
				showDialog: true,
				data: {
					id: (this.item.length > 0) ? this.item[0].id : null,
					name: (this.item.length > 0) ? this.item[0].name : null,
					description: (this.item.length > 0) ? this.item[0].description : null,
					endpoint: (this.item.length > 0) ? this.item[0].endpoint : null,
					header: (this.item.length > 0) ? JSON.parse(this.item[0].header) : [],
					payload: (this.item.length > 0) ? JSON.parse(this.item[0].payload) : []
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
					id: this.data.id,
					name: this.data.name,
					description: this.data.description,
					endpoint: this.data.endpoint,
					header: JSON.stringify(this.data.header),
					payload: JSON.stringify(this.data.payload)
				};
				this.$store.dispatch('apiStore/saveApis', payload);
				this.$Helper.alertHelper.apiSaved();
				this.closeDialog();
			},
			closeDialog() {
				this.$emit('closeDialog');
			},
			addHeader() {
				this.data.header.push('');
			},
			addPayload() {
				this.data.payload.push('');
			},
			removeHeader(index) {
				this.data.header.splice(index,1);
			},
			removePayload(index) {
				this.data.payload.splice(index,1);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
