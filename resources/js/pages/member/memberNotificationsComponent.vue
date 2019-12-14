<template>
	<div>
		<h1>Notifications</h1>

		<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-6'>
				<ul class="list-group mt-3">
					<li class="list-group-item bg-dark text-white">
						<i class='fas fa-globe'></i> General Notifications
					</li>
					<li class="list-group-item" v-if='generalNotifications.length == 0'>
						<i class='fas fa-globe'></i> You have no system notifications!
					</li>
					<li class="list-group-item" v-for="(item,index) in generalNotifications" :key='index'>
						<v-icon>{{ item.icon }}</v-icon> <b>{{ item.header }}</b> - {{ item.content }}
					</li>
				</ul>
			</div>
			<div class='col-xs-12 col-sm-12 col-md-6'>
				<ul class="list-group mt-3">
					<li class="list-group-item bg-info">
						<i class='fas fa-bell'></i> Personal Notifications
					</li>
					<li class="list-group-item" v-if='personalNotifications.length == 0'>
						<i class='fas fa-bell'></i> You have no personal notifications!
					</li>
					<li class="list-group-item" v-for="(item,index) in personalNotifications" :key='index'>
						<v-icon>{{ item.icon }}</v-icon> <b>{{ item.header }}</b> - {{ item.content }}
					</li>
				</ul>
			</div>
		</div>

	</div>
</template>

<script>
	export default {
		name      : "member-notifications-component",
		props     : [],
		components: {},
		created()   {},
		data()      { return {} },
		computed  : {
			generalNotifications() {
				return this.$store.state.notificationsStore.general;
			},
			personalNotifications() {
				return this.$store.state.notificationsStore.user;
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
