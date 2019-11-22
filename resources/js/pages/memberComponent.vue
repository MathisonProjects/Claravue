<template>
	<div>
		<div class='row' v-if='loggedIn'>
			<div class='col'>
				<div class='row'>
					<div class='col-xs-12 col-md-2'>
						<button type='button' class='btn btn-primary'><i class='fas fa-tachometer-alt'></i> Dashboard</button>
					</div>
					<div class='col-xs-12 col-md-2'>
						<button type='button' class='btn btn-primary'><i class="fas fa-envelope-open-text"></i> Messages</button>
					</div>
					<div class='col-xs-12 col-md-2'>
						<button type='button' class='btn btn-primary'><i class='fas fa-cog'></i> Settings</button>
					</div>
					<div class='col-xs-12 col-md-2'>
						<button type='button' @click='$router.push("/member/notifications")' class='btn btn-secondary' v-if='notifications.general.length == 0'><i class='fas fa-globe'></i> 0</button>
						<button type='button' @click='$router.push("/member/notifications")' class='btn btn-success' v-if='notifications.general.length > 0'><i class='fas fa-globe'></i> {{ notifications.general.length }}</button>
						<button type='button' @click='$router.push("/member/notifications")' class='btn btn-secondary' v-if='notifications.personal.length == 0'><i class='fas fa-bell'></i> 0</button>
						<button type='button' @click='$router.push("/member/notifications")' class='btn btn-success' v-if='notifications.personal.length > 0'><i class='fas fa-bell'></i> {{ notifications.personal.length }}</button>
					</div>
					<div class='col-xs-12 col-md-2'>
						<button type='button' class='btn btn-primary' @click='$Helper.userHelper.logout()'><i class='fas fa-sign-out-alt'></i> Logout</button>
					</div>
				</div>
				
				<memberHomeComponent />
			</div>
		</div>
		<div class='row' v-if='!loggedIn'>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text>
						<h3>Register</h3>
						<registerComponent />
					</v-card-text>
				</v-card>
			</div>
			<div class='col-xs-12 col-md-6'>
				<v-card class="mx-auto">
					<v-card-text v-if='!forgotAccount'>
						<h3>Login</h3>
						<loginComponent />
						<a href='javascript:void(0)' @click='forgotAccount = true'>I forgot my password...</a>
					</v-card-text>
					<v-card-text v-if='forgotAccount'>
						<h3>Forgot Password</h3>
						<forgotPasswordComponent />
						<a href='javascript:void(0)' @click='forgotAccount = false'>I remember my password!</a>

					</v-card-text>
				</v-card>
			</div>
		</div>
	</div>
</template>

<script>
	import registerComponent from '@/components/registerComponent';
	import loginComponent from '@/components/loginComponent';
	import forgotPasswordComponent from '@/components/forgotPasswordComponent';
	import memberHomeComponent from './member/memberHomeComponent';
	export default {
		name      : "member-component",
		props     : [],
		components: {
			registerComponent,
			loginComponent,
			forgotPasswordComponent,
			memberHomeComponent
		},
		created()   {},
		data()      {
			return {
				forgotAccount: false
			}
		},
		computed  : {
			loggedIn() {
				return this.$store.getters['userStore/loggedIn'];
			},
			notifications() {
				if (this.loggedIn) {
					return {
						general: this.$store.state.notificationsStore.general,
						personal: []
					}
				} else {
					return null;
				}
			}
		},
		methods   : {},
		watch     : {}
	};
</script>

<style scoped></style>
