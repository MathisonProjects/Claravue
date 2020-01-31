<template>
	<v-dialog width="725" v-model='showDialog'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>Run API</span>
        	</v-card-title>
        	<v-card-text>
				
        	</v-card-text>
        	<v-divider></v-divider>
		</v-card>
	</v-dialog>
</template>

<script>
	export default {
		name      : "run-api-component",
		props     : [
			'item'
		],
		components: {},
		created()   {},
		data()      {
			return {
				showDialog: true
			}
		},
		computed  : {
			apiItem() {
				return this.item[0];
			}
		},
		methods   : {
			closeDialog() {
				this.$emit('closeDialog');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
