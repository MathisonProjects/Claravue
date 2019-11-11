<template>
	<div>
		<h1>Add Page</h1>

		<div class='form-group'>
			<label for='label'>label</label>
			<input type='text' id='label' class='form-control' v-model='data.key' />
		</div>
		<div class='form-group'>
			<label for='label'>label</label>
			<input type='text' id='label' class='form-control' v-model='data.title' />
		</div>
		<div class='row'>
			<div class='col text-right'><button type='button' class='btn btn-primary'><i class='fas fa-save'></i> Save</button></div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "set-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					key: null,
					title: null,
					type: null,
					data: []
				}
			}
		},
		computed  : {},
		methods   : {
			save() {
				this.$store.dispatch('pageStore/savePages', this.data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
