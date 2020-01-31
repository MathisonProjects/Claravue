<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1><v-icon x-large>mdi-cellphone-link</v-icon> APIs</h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-danger' @click='deleteApi' v-if='selected.length > 0'><i class='fas fa-minus'></i> Delete</button>
				<button type='button' class='btn btn-success' @click='runApi = true' v-if='selected.length > 0'><i class='fas fa-phone-volume'></i> Run API</button>
				<button type='button' class='btn btn-primary' @click='showDialog = true'><i class='fas fa-plus'></i>
				<span v-if='selected.length > 0'>Update</span>
				<span v-if='selected.length === 0'>Add</span>
				API</button>
			</div>
		</div>

		<listComponent v-model='selected' :headers='headers' :items='itemsList' :perPage='perPage' />
		<setComponent :item='selected' v-if='showDialog' @closeDialog='showDialog = false' />
		<runApiComponent :item='selected' v-if='runApi' @closeDialog='showDialog = false' />
	</div>
</template>

<script>
	import listComponent from '@/components/shared/listComponent';
	import setComponent from '@/components/admin/apis/setComponent';
	import runApiComponent from '@/components/admin/apis/runApiComponent';
	export default {
		name      : "apis-page-component",
		props     : [],
		components: {
			listComponent,
			setComponent,
			runApiComponent
		},
		created()   {},
		data()      {
			return {
				selected: [],
				showDialog: false,
				runApi: false,
				headers: [
					{ text: 'Id', align: 'left', sortable: true, value: 'id' },
					{ text: 'Name', value: 'name', sortable: true },
					{ text: 'Description', value: 'description' },
					{ text: 'Endpoints', value: 'endpoint' },
					{ text: 'Created At', value: 'created_at' },
					{ text: 'Updated At', value: 'updated_at', sortable: true }
				],
				perPage: 5
			}
		},
		computed  : {
			itemsList() {
				return this.$store.state.apiStore.apis;
			}
		},
		methods   : {
			deleteApi() {
				this.$store.dispatch('apiStore/deleteApis', { id: this.selected[0].id });
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
