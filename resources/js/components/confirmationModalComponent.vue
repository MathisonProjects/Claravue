<template>
	<v-dialog width="725" v-model='confirmModal'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				Confirmation Required
        	</v-card-title>
        	<v-card-text class='mt-3' v-html='confirmationText'></v-card-text>
        	<v-divider></v-divider>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="primary" text @click='closeDialog'><i class='fas fa-times'></i> Cancel</v-btn>
				<v-btn color="primary" text @click='confirm'><i class='fas fa-thumbs-up'></i> Confirm</v-btn>
			</v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
	export default {
		name      : "confirmation-modal-component",
		props     : [
			'confirmationText'
		],
		components: {},
		created()   {},
		data()      {
			return {
				confirmModal: true
			}
		},
		computed  : {},
		methods   : {
			confirm() {
				this.$emit('confirm')
				this.closeDialog();
			},
			closeDialog() {
				this.$emit('closeDialog');
			}
		},
		watch     : {
			confirmModal() {
				this.closeDialog();
			}
		}
	};
</script>

<style scoped></style>
