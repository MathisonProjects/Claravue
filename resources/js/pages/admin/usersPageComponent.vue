<template>
	<div>
		<h1><v-icon x-large>mdi-account-group</v-icon> Users</h1>

		<v-data-table :headers="headers" :items="records" :items-per-page="perPage" class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "users-page-component",
		props     : [],
		components: {},
		created()   {
			axios.get('/api/user/all').then(response => {
				this.records = response.data;
			});
		},
		data()      {
			return {
				perPage: 5,
				headers: [
		          { text: 'Username', align: 'left', sortable: true, value: 'name' },
		          { text: 'Email', value: 'email' },
		          { text: 'Created At', value: 'created_at' },
		          { text: 'Active', value: 'active' },
		        ],
		        records: []
			}
		},
		computed  : {},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
