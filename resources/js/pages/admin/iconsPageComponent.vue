<template>
	<div>
		<h1>
			<v-icon x-large v-if='iconType == "md"'>mdi-material-design</v-icon>
			<v-icon x-large v-if='iconType == "fa"'>fab fa-font-awesome</v-icon>
			Icons List
		</h1>
		<div class='row'>
			<div class='col-md-6'>
				<div class='form-group'>
					<b>Total Icons:</b> {{ filteredIcons.length }}<br />
					<label for='searchString'>Search</label>
					<input type='text' id='searchString' placeholder='String Search...' class='form-control' v-model='searchString' />
				</div>
			</div>
			<div class='col-md-6 text-right'>
				<a href='javascript:void(0)' @click='iconType = "md"'><v-icon class='blue--text'>mdi-material-design</v-icon></a>
				<a href='javascript:void(0)' @click='iconType = "fa"'><v-icon class='blue--text'>fab fa-font-awesome</v-icon></a>
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
		name      : "admin-icons-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				iconType: 'md',
				searchString: '',
				page: 1
			}
		},
		computed  : {
			totalPages() {
				return Math.ceil(this.filteredIcons.length / 100);
			},
			iconItems() {
				if (this.iconType == 'md') {
					return this.$store.state.jsonStore.materialIconsList;
				} else if (this.iconType == 'fa') {
					return this.$store.state.jsonStore.fontAwesomeIconsList;
				}
			},
			filteredIcons() {
				return this.iconItems.filter(item => {
					return item.includes(this.searchString);
				});
			},
			paginatedIcons() {
				return this.filteredIcons.filter((item, index) => {
					return index > ((this.page - 1) * 100) && index < (this.page * 100)
				});
			}
		},
		methods   : {},
		watch     : {
			searchString(newVal) {
				this.page = 1;
			}
		}
	};
</script>

<style scoped>
</style>
