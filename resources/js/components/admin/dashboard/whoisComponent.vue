<template>
	<div>
		<div class='subtitle-2'>User</div>
		<div class='overline'>Username: {{ user.name }}</div>
		<div class='overline'>Email: {{ user.email }}</div>
		<div class='overline'>Created: {{ user.created_at }}</div>
	</div>
</template>

<script>
	export default {
		name      : "whois-component",
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
