<template>
	<div>
		<h1><v-icon x-large>mdi-home</v-icon> Home</h1>
		<div class='row'>
			<div class='col-xs-12 col-md-4'>
				<v-card class="mx-auto">
					<v-card-text>
						<div class='subtitle-2'>User</div>
						<div class='overline'>Username: {{ user.name }}</div>
						<div class='overline'>Email: {{ user.email }}</div>
						<div class='overline'>Created: {{ user.created_at }}</div>
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-4'>
				<v-card class="mx-auto">
					<v-card-text>
						Filler 2
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-4'>
				<v-card class="mx-auto">
					<v-card-text>
						Filler 3
					</v-card-text>
				</v-card>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						Filler 4
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						Filler 5
					</v-card-text>
				</v-card>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "admin-home-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			user() {
				return this.$store.state.userStore.user;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
