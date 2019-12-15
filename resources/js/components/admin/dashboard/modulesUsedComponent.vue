<template>
	<div>
		<div class='subtitle-2'>Modules Used</div>
		<ul class="list-group">
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.membershipEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.membershipEnabled == "0"'></i> Membership</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.blogEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.blogEnabled == "0"'></i> Blog</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.shopEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.shopEnabled == "0"'></i> Shopping</li>
			<li class="list-group-item"><i class="fas fa-circle text-success" v-if='settings.forumEnabled == "1"'></i> <i class="fas fa-circle text-danger" v-if='settings.forumEnabled == "0"'></i> Forum</li>
		</ul>
	</div>
</template>

<script>
	export default {
		name      : "modules-used-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			settings() {
				return this.$store.state.settingsStore.settings;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
