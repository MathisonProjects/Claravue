<template>
	<div>
		<div class='row'>
			<div class='col-md-6'>
				<h1>Page Builder</h1>
			</div>
			<div class='col-md-6' v-if='pages.length > 0'>
				<v-select v-model='page' :items="pages" :item-text='item => item.data.name' :item-value='item => item' label="Page" placeholder='Select your page...' clearable dense  />
			</div>
		</div>
		<hr />
		<div class='overline text-center' v-if='page === null'>
			Select a page before you build your page
		</div>
		<div class='overline text-center' v-if='page !== null'>
			Build and preview your page below...
		</div>
		<hr />
		<div class='row' v-for='(item, index) in data.structure'>
			Fill this out...
		</div>
		<div class='row creation_row' v-if='page !== null'>
			<div class='col text-center'>
				<a href='javascript:void(0)' title='Add Row...' @click='addRow()'><i class='fas fa-plus'></i></a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "page-builder-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				page: null,
				data: {
					structure: []
				}
			}
		},
		computed  : {
			pagesModule() {
				return this.$store.state.cmsStore.modules.filter(item => {
					return item.name === 'pages';
				})[0];
			},
			pages() {
				return this.$store.state.cmsRecordsStore.records.filter(item => {
					return item.mid === this.pagesModule.id
				});
			}
		},
		methods   : {
			addRow() {
				this.data.structure.push([])
			}
		},
		watch     : {}
	};
</script>

<style scoped>
	.creation_row {
		border: black 1px solid;
	}
</style>
