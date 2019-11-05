<template>
	<div>
		<div class='form-group'>
			<label for='txtUser'>Username</label>
			<input type='text' id='txtUser' class='form-control' v-model='data.username' />
		</div>
		<div class='form-group'>
			<label for='txtUser'>Email</label>
			<input type='text' id='txtUser' class='form-control' v-model='data.email' />
		</div>
		<div class='form-group'>
			<label for='txtPass'>Password</label>
			<input type='password' id='txtPass' class='form-control' v-model='data.password' />
		</div>
		<button type='button' class='btn btn-primary' @click='register'><i class='fas fa-user'></i> register</button>
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
					username: null,
					email: null,
					password
				}
			}
		},
		computed  : {},
		methods   : {
			register() {
				console.log(this.data)
			}
		},
		watch     : {}
	};
</script>

<style scoped></style>
