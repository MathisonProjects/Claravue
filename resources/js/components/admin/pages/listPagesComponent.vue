<template>
	<div>
		<v-data-table :headers="headers" :items="pagesList" :items-per-page="perPage" v-model='selected' class="elevation-1" dense show-select single-select>
			<template v-slot:item.key="{ item }">
				<a :href='loadUrl(item.key)' target='_BLANK'>{{ item.key }}</a>
			</template>
		</v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "list-pages-component",
		props     : [],
		components: {},
		created()   {
			this.$store.dispatch('pageStore/getPages');
		},
		data()      {
			return {
				perPage: 5,
				headers: [
		          { text: 'Id', align: 'left', sortable: true, value: 'id' },
		          { text: 'Key', value: 'key' },
		          { text: 'Type', value: 'type' },
		          { text: 'Created At', value: 'created_at' },
		          { text: 'Updated At', value: 'updated_at' },
		        ],
		        selected: []
			}
		},
		computed  : {
			pagesList() {
				return this.$store.state.pageStore.pages;
			}
		},
		methods   : {
			loadUrl(key) {
				return '#/page/' + key
			}
		},
		watch     : {
			selected(newVal) {
				this.$emit('setEdit', newVal);
			}
		}
	};
</script>

<style scoped></style>
