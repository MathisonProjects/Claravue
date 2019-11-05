<template>
	<div>
		<div class='form-group'>
			<label for='txtUser'>Username/Email</label>
			<input type='text' id='txtUser' class='form-control' v-model='data.username' placeholder='eg. MathisonProjects' />
		</div>
		<div class='form-group'>
			<label for='txtPass'>Password</label>
			<input type='password' id='txtPass' class='form-control' v-model='data.password' placeholder='eg. YourPassword123' />
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
					username: null,
					password: null
				}
			}
		},
		computed  : {},
		methods   : {
			login() {
				console.log(this.data)
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
