<template>
	<div>
		<div class='form-group'>
			<label for='txtUser'><i class="fas fa-at"></i> Username/Email</label>
			<input type='text' id='txtUser' class='form-control' v-model='data.email' placeholder='eg. MathisonProjects' @keyup.enter="onEnter" />
		</div>
		<div class='form-group'>
			<label for='txtPass'><i class="fas fa-key"></i> Password</label>
			<input type='password' id='txtPass' class='form-control' v-model='data.password' placeholder='eg. YourPassword123' @keyup.enter="onEnter" />
		</div>
		<div class='form-group text-right'>
			<button type='button' class='btn btn-primary' @click='login'><i class='fas fa-user'></i> Login</button>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "login-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					email: null,
					password: null
				}
			}
		},
		computed  : {},
		methods   : {
			login() {
				this.$store.dispatch('userStore/login', this.data);
			},
			onEnter() {
				this.login();
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
