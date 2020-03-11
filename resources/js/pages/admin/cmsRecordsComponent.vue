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
	</div>
</template>

<script>
	import deleteEditViewAddButtonsComponent from '@/components/shared/deleteEditViewAddButtonsComponent'

	export default {
		name      : "cms-records-component",
		props     : [],
		components: {
			deleteEditViewAddButtonsComponent
		},
		created()   {},
		data()      {
			return {
				showModal: false,
				selected: []
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
				return allRecords.filter(item => {
					return item.mid === parseInt(this.$route.params.id)
				});
			}
		},
		methods   : {
			deleteRecord() {},
			goToRecord() {
				this.$router.push('/admin/cms/' + this.$route.params.id + '/' + this.selected[0].id);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
