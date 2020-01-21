<template>
	<v-dialog width="725" v-model='modalShow'>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>
				<span>Welcome</span>
        	</v-card-title>
        	<v-card-text>
        		<p>{{ settings.arrivalPopup }}</p>
        	</v-card-text>
        	<v-divider></v-divider>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="primary" text @click='deny'><i class='fas fa-times'></i> Deny</v-btn>
				<v-btn color="primary" text @click='accept'><i class='fas fa-save'></i> Accept</v-btn>
			</v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
	export default {
		name      : "landing-dialog-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				modalShow: true
			}
		},
		computed  : {
			settings() {
				return this.$store.state.settingsStore.settings;
			}
		},
		methods   : {
			accept() {
				this.modalShow = false;
				this.closeDialog();
			},
			deny() {
				window.location('https://google.com/');
			},
			closeDialog() {
				this.$emit('closeDialog');
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
