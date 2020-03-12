<template>
	<div>
		<div class='row'>
			<div class='col-md-6'>
				<h3><v-icon x-large>mdi-office-building</v-icon> CMS [{{ currentModule.name }}]</h3>
				<p class='overline'>{{ currentModule.description }}</p>
			</div>
			<div class='col-md-6 text-right'>
				<deleteEditViewAddButtonsComponent @fireDelete='deleteRecord' @fireEdit='showModal = true' @fireView='goToRecord' @fireAdd='showModal = true' :selected='selected' :variantName='currentModule.name' />
			</div>
		</div>
		<recordListComponent v-model='selected' :records='currentRecords' />
		<recordDialogComponent @closeDialog='showModal = false' :record='selected' v-if='showModal' />
	</div>
</template>

<script>
	import deleteEditViewAddButtonsComponent from '@/components/shared/deleteEditViewAddButtonsComponent'
	import recordListComponent from '@/components/admin/cms/recordListComponent'
	import recordDialogComponent from '@/components/admin/cms/recordDialogComponent'

	export default {
		name      : "cms-records-component",
		props     : [],
		components: {
			deleteEditViewAddButtonsComponent,
			recordListComponent,
			recordDialogComponent
		},
		created()   {},
		data()      {
			return {
				selected: [],
				showModal: false
			}
		},
		computed  : {
			currentModule() {
				const modules = this.$store.state.cmsStore.modules;
				let currentModule = null;
				for (var i in modules) {
					if (modules[i].id === parseInt(this.$route.params.id)) {
						currentModule = modules[i];
					}
				}
				return currentModule;
			},
			currentRecords() {
				const allRecords = this.$store.state.cmsRecordsStore.records;
				const shownRecords = allRecords.filter(item => {
					return item.mid === parseInt(this.$route.params.id)
				});
				return shownRecords;
			}
		},
		methods   : {
			deleteRecord() {
				this.$store.dispatch('cmsRecordsStore/deleteStore', this.selected[0]);
				this.selected = [];
			},
			goToRecord() {
				this.$router.push('/admin/cms/' + this.$route.params.id + '/' + this.selected[0].id);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
