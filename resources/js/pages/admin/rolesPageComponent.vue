<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1><v-icon x-large>mdi-account-badge</v-icon> Roles</h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-danger' v-if='selected.length > 0' @click='deleteRole'><i class='fas fa-minus'></i> Remove Selected Role</button>
				<button type='button' class='btn btn-primary' @click='addingRole = true'><i class='fas fa-plus'></i> Add Role</button>
			</div>
		</div>

		<div class='row' v-if='addingRole'>
			<div class='col'>
				<div class='form-group'>
					<label for='roleName'>Role Name</label>
					<input type='text' id='roleName' class='form-control' v-model='data.name' placeholder='eg. User' />
				</div>
				<div class='form-group text-right'>
					<button type='button' class='btn btn-primary' @click='saveRole'><i class='fas fa-paper-plane'></i> Save Role</button>
				</div>
			</div>
		</div>

		<v-data-table :headers="headers" :items="roleItems" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "roles-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				addingRole: false,
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Name', value: 'name' },
					{ text: 'Created', value: 'created_at' }
				],
				data: {
					name: null
				},
				selected: []
			}
		},
		computed  : {
			roleItems() {
				return this.$store.state.roleStore.roles;
			}
		},
		methods   : {
			saveRole() {
				this.$store.dispatch('roleStore/saveRole', this.data);
			},
			deleteRole() {
				var data = {
					id: this.selected[0].id
				}
				this.$store.dispatch('roleStore/deleteRole', data);
				this.selected = [];
				this.addingRole = false;
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
