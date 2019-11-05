<template>
	<div>
		<h1><v-icon x-large>mdi-material-design</v-icon> Icons List</h1>
		<div class='row'>
			<div class='col'>
				<div class='form-group'>
					<b>Total Icons:</b> {{ filteredMaterialIcons.length }}<br />
					<label for='searchString'>Search</label>
					<input type='text' id='searchString' placeholder='String Search...' class='form-control' v-model='searchString' />
				</div>
			</div>
		</div>
		<v-pagination v-model="page" :length="totalPages"></v-pagination>
		<div class='row'>
			<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3' v-for='(icon, index) in paginatedIcons'>
				<div class='row'>
					<div class='col-4 text-center'><v-icon>{{ icon }}</v-icon></div>
					<div class='col-8'>{{ icon }}</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "icons-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				searchString: '',
				page: 1
			}
		},
		computed  : {
			totalPages() {
				return Math.ceil(this.filteredMaterialIcons.length / 100)
			},
			materialIcons() {
				return this.$store.state.jsonStore.materialIconsList;
			},
			filteredMaterialIcons() {
				return this.materialIcons.filter(item => {
					return item.includes(this.searchString);
				});
			},
			paginatedIcons() {
				return this.filteredMaterialIcons.filter((item, index) => {
					return index > ((this.page - 1) * 100) && index < (this.page * 100)
				});
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped>
</style>
