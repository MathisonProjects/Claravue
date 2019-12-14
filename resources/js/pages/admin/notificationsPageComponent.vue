<template>
	<div>
		<div class='row'>
			<div class='col-xs-12 col-md-6'>
				<h1><v-icon x-large>mdi-bell-circle</v-icon> Notifications</h1>
			</div>
			<div class='col-xs-12 col-md-6 text-right'>
				<button type='button' class='btn btn-danger' v-if='selected.length > 0' @click='deletenotification'><i class='fas fa-minus'></i> Remove Selected Notification</button>
				<button type='button' class='btn btn-primary' @click='addingNotification = true'><i class='fas fa-plus'></i> Add Notification</button>
			</div>
		</div>

		<div class='row' v-if='addingNotification'>
			<div class='col'>
				<div class='form-group'>
					<label for='dataIcon'>Icon</label>
					<input type='text' id='dataIcon' placeholder='eg. mdi-bell-circle' class='form-control' v-model='data.icon' />
				</div>
				<div class='form-group'>
					<label for='dataHeader'>Header</label>
					<input type='text' id='dataHeader' placeholder='eg. What people will always read' class='form-control' v-model='data.header' />
				</div>
				<div class='form-group'>
					<label for='dataContent'>Content</label>
					<input type='text' id='dataContent' placeholder='eg. What people need to know' class='form-control' v-model='data.content' />
				</div>
				<div class='form-group'>
					<label for='dataExpiration'>Expiration</label>
					<input type='text' id='dataExpiration' placeholder='eg. yyyy-mm-dd h:i:s' class='form-control' v-model='data.expiration' />
				</div>
				<div class='form-group text-right'>
					<button type='button' class='btn btn-primary' @click='saveNotification'><i class='fas fa-paper-plane'></i> Save Notification</button>
				</div>
			</div>
		</div>

		<v-data-table :headers="headers" :items="notificationItems" :items-per-page="perPage" show-select single-select v-model='selected' class="elevation-1" dense></v-data-table>
	</div>
</template>

<script>
	export default {
		name      : "notifications-page-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				addingNotification: false,
				perPage: 5,
				headers: [
					{ text: 'Id', value: 'id' },
					{ text: 'Icon', value: 'icon' },
					{ text: 'Header', value: 'header' },
					{ text: 'Content', value: 'content' },
					{ text: 'Expiration', value: 'expiration' },
					{ text: 'Created', value: 'created_at' }
				],
				data: {
					icon: null,
					header: null,
					content: null,
					expiration: null,
					uid: 0,
					hasRead: 0
				},
				selected: []
			}
		},
		computed  : {
			notificationItems() {
				return this.$store.state.notificationsStore.general;
			}
		},
		methods   : {
			saveNotification() {
				this.$store.dispatch('notificationsStore/saveNotifications', this.data);
			},
			deletenotification() {
				var data = {
					id: this.selected[0].id
				}
				this.$store.dispatch('notificationsStore/deleteNotification', data);
				this.selected = [];
				this.addingNotification = false;
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
