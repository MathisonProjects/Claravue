<template>
	<div>
		<h1><v-icon x-large>mdi-account-group</v-icon> Users</h1>

		<v-data-table :headers="headers" :items="records" items-per-page="5" class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "users-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				headers: [
		          { text: 'Username', align: 'left', sortable: false, value: 'name' },
		          { text: 'Email', value: 'email' },
		          { text: 'Last Login', value: 'lastLogin' },
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
