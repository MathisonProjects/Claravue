<template>
	<div>
		<button type='button' class='btn btn-danger btn-sm' v-if='selected.length > 0' @click='fireDelete'><i class='fas fa-trash'></i> Delete {{ variantName }}</button>
		<button type='button' class='btn btn-warning btn-sm' v-if='selected.length > 0' @click='fireEdit'><i class='fas fa-pencil-alt'></i> Edit {{ variantName }}</button>
		<button type='button' class='btn btn-success btn-sm' v-if='selected.length > 0' @click='fireView'><i class='fas fa-eye'></i> View {{ variantName }}</button>
		<button type='button' class='btn btn-primary btn-sm' v-if='selected.length === 0' @click='fireAdd'><i class='fas fa-plus'></i> Add {{ variantName }}</button>
	</div>
</template>

<script>
	export default {
		name      : "delete-edit-view-add-buttons-component",
		props     : [
			'variantName',
			'selected'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {
			fireDelete() {
				this.$emit('fireDelete');
			},
			fireEdit() {
				this.$emit('fireEdit');
			},
			fireView() {
				this.$emit('fireView');
			},
			fireAdd() {
				this.$emit('fireAdd');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
