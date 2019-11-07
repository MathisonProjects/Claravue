<template>
	<div>
		<div class='form-group'>
			<label for='txtUser'><i class='fas fa-user'></i> Username</label>
			<input type='text' id='txtUser' class='form-control' v-model='data.name' placeholder='eg. MathisonProjects' />
		</div>
		<div class='form-group'>
			<label for='txtEmail'><i class="fas fa-at"></i> Email</label>
			<input type='text' id='txtEmail' class='form-control' v-model='data.email' placeholder='eg. jacob@mathisonprojects.com' />
		</div>
		<div class='form-group'>
			<label for='txtPass'><i class="fas fa-key"></i> Password</label>
			<input type='password' id='txtPass' class='form-control' v-model='data.password' placeholder='eg. YourPassword123' />
		</div>
		<div class='form-group'>
			<label for='txtPass'><i class="fas fa-key"></i> Password Confirmation</label>
			<input type='password' id='txtPass' class='form-control' v-model='data.password_confirmation' placeholder='eg. YourPassword123' />
		</div>
		<div class='form-group text-right'>
			<button type='button' class='btn btn-primary' @click='register'><i class='fas fa-user'></i> Register</button>
		</div>
	</div>
</template>

<script>
	export default {
		name      : "register-component",
		props     : [],
		components: {},
		created()   {},
		data()      {
			return {
				data: {
					name: null,
					email: null,
					password: null,
					password_confirmation: null
				}
			}
		},
		computed  : {},
		methods   : {
			register() {
				this.$store.dispatch('userStore/register', this.data);
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
