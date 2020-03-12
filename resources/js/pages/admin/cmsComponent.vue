<template>
	<div>
		<div class='row'>
			<div class='col-md-6'>
				<h3><v-icon x-large>mdi-office-building</v-icon> CMS</h3>	
			</div>
			<div class='col-md-6 text-right'>
				<deleteEditViewAddButtonsComponent @fireDelete='deleteModule' @fireEdit='showModal = true' @fireView='goToModule' @fireAdd='showModal = true' :selected='selected' variantName='Module' />
			</div>
		</div>
		<listComponent v-model='selected' />
		<moduleDialogComponent @closeDialog='showModal = false' :module='selected' v-if='showModal' />
	</div>
</template>

<script>
	import listComponent from '@/components/admin/cms/listComponent'
	import moduleDialogComponent from '@/components/admin/cms/moduleDialogComponent'
	import deleteEditViewAddButtonsComponent from '@/components/shared/deleteEditViewAddButtonsComponent'
	export default {
		name      : "admin-cms-component",
		props     : [],
		components: {
			listComponent,
			moduleDialogComponent,
			deleteEditViewAddButtonsComponent
		},
		created()   {},
		data()      {
			return {
				selected: [],
				showModal: false
			}
		},
		computed  : {},
		methods   : {
			goToModule() {
				this.$router.push('/admin/cms/' + this.selected[0].id);
			},
			deleteModule() {
				this.$store.dispatch('cmsStore/deleteStore', this.selected[0]);
				this.selected = [];
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
