<template>
	<div>
		<div class='row'>
			<div class='col-md-6'>
				<h1><v-icon x-large>mdi-file-outline</v-icon> Pages (beta)</h1>
			</div>
			<div class='col-md-6 text-right'>
				<deleteEditViewAddButtonsComponent @fireDelete='deleteRecord' @fireEdit='showModal = true' @fireView='goToRecord' @fireAdd='goToPageBuilder' :selected='selected' variantName='Page' />
			</div>
		</div>
	</div>
</template>

<script>
	import deleteEditViewAddButtonsComponent from '@/components/shared/deleteEditViewAddButtonsComponent'

	export default {
		name      : "pages-page-component",
		props     : [],
		components: {
			deleteEditViewAddButtonsComponent
		},
		created()   {},
		data()      {
			return {
				selected: []
			}
		},
		computed  : {},
		methods   : {
			deleteRecord() {},
			goToRecord() {},
			goToPageBuilder() {
				this.$router.push('/admin/pages-beta/builder');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
