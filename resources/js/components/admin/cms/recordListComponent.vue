<template>
	<div>
		<v-data-table :headers="headers" :items="records" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense>
			<template v-slot:item.name="{ item }">{{ item.data.name }}</template>
		</v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "record-list-component",
		props     : [
			'records'
		],
		model: {
			event: 'updateSelected'
		},
		components: {},
		created()   {},
		data()      {
			return {
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Name', value: 'name' },
					{ text: 'Created At', value: 'created_at' },
					{ text: 'Updated At', value: 'updated_at' }
				],
				selected: [],
			}
		},
		computed  : {},
		methods   : {},
		watch     : {
			selected(newValue) {
				this.$emit('updateSelected', newValue);
			}
		}
	};
</script>

<style scoped></style>
