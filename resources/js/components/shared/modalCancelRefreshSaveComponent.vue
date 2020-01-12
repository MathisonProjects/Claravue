<template>
	<div>
		<v-card-actions>
			<v-spacer></v-spacer>
			<v-btn color="primary" text @click='closeDialog'><i class='fas fa-times'></i> Cancel</v-btn>
			<v-btn color="primary" text @click='reset'><i class='fas fa-redo'></i> Refresh</v-btn>
			<v-btn color="primary" text @click='save'><i class='fas fa-save' :disabled='disabledSave'></i> Save</v-btn>
		</v-card-actions>
	</div>
</template>

<script>
	export default {
		name      : "modal-cancel-refresh-save-component",
		props     : [
			'disabledSave'
		],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {},
		methods   : {
			closeDialog() {
				this.$emit('closeDialog');
			},
			reset() {
				this.$emit('reset');
			},
			save() {
				this.$emit('save');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
