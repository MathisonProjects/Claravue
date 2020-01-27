<template>
	<div>
		<v-data-table :headers="headers" :items="jsonList" :items-per-page="perPage" v-model='selected' class="elevation-1" dense show-select single-select></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "list-component",
		props     : [],
		model: {
			event: 'updateSelected'
		},
		components: {},
		created()   {},
		data()      {
			return {
				perPage: 5,
				headers: [
		          { text: 'Id', align: 'left', sortable: true, value: 'id' },
		          { text: 'Name', value: 'name', sortable: true },
		          { text: 'Description', value: 'description' },
		          { text: 'Created At', value: 'created_at' },
		          { text: 'Updated At', value: 'updated_at', sortable: true },
		        ],
		        selected: []
			}
		},
		computed  : {
			jsonList() {
				return this.$store.state.jsonRecordsStore.json;
			}
		},
		methods   : {},
		watch     : {
			selected(newValue) {
				this.$emit('updateSelected', newValue);
			}
		}
	};
</script>

<style scoped></style>
