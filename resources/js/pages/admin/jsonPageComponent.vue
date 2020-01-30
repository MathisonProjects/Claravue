<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'><h1><v-icon x-large>mdi-json</v-icon> JSON Records</h1></div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-danger btn-sm' v-if='selected.length > 0' @click='deleteItem'><i class='fas fa-minus'></i> Delete</button>
				<button type='button' class='btn btn-primary btn-sm' @click='showDialog = true'>
					<i class='fas fa-plus'></i>
					<span v-if='selected.length === 0'>Add</span>
					<span v-if='selected.length > 0'>Update</span>
					JSON Record
				</button>
			</div>
		</div>
		<listComponent v-model='selected' />
		<setComponent :jsonData='selected' v-if='showDialog' @closeDialog='showDialog = false' />
	</div>
</template>

<script>
	import listComponent from '@/components/admin/json/listComponent';
	import setComponent from '@/components/admin/json/setComponent';
	export default {
		name      : "json-page-component",
		props     : [],
		components: {
			listComponent,
			setComponent
		},
		created()   {},
		data()      {
			return {
				showDialog: false,
				selected: []
			}
		},
		computed  : {},
		methods   : {
			deleteItem() {
				this.$store.dispatch('jsonRecordsStore/deleteJson', { id: this.selected[0].id });
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
